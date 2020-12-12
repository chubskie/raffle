$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
  }
});

var excluded = ['2OMMIGXFGD']

var colors = ['#4daf7c', '#87d37c', '#00b16a', '#2ecc71', '#3fc380']
var transitionColor = ['#ff8d06', '#d91400', '#82dc2c']
/**
 * Raffle
 * 2012
 * https://github.com/stringham/raffle
 * Copyright Ryan Stringham
 */

 var inProgress = false
 var size = 60

 function getRandomColor(color) {
  return color[Math.floor(Math.random() * color.length)]
}

function map(a, f) {
  for (var i = 0; i < a.length; i++) {
    f(a[i], i)
  }
}

var ticketNames
var ticketPoints

function elementInViewport(el) {
  var top = el.offsetTop
  var left = el.offsetLeft
  var width = el.offsetWidth
  var height = el.offsetHeight

  while (el.offsetParent) {
    el = el.offsetParent
    top += el.offsetTop
    left += el.offsetLeft
  }

  return (
    top >= window.pageYOffset &&
    left >= window.pageXOffset &&
    top + height <= window.pageYOffset + window.innerHeight &&
    left + width <= window.pageXOffset + window.innerWidth
    )
}

function Ticket(name, ref) {
  this.name = name
  this.points = 1
  this.dom = $("<div class='ticket' data-ref='" + ref + "'>").text(name)
  this.fixPosition = function() {
    var me = this
    this.dom.css({
      position: 'absolute',
      top: me.dom.offset().top,
      left: me.dom.offset().left,
      background: getRandomColor(colors)
    })
  }
  this.decrement = function(length, callback) {
    var me = this
    this.points--
    if (this.points == 0) {
      var directions = ['up', 'down', 'left', 'right']
      this.dom
      .css({ 'background-color': getRandomColor(transitionColor) })
      .hide(
        'drop',
        { direction: directions[length % directions.length] },
        length <= 3 ? 750 : 3000 / length,
        function() {
         callback();
       }
       )
      $('#participant-number').text(length - 1 + '/' + tickets.length)
    } else {
      this.dom.css({
        'background-color': 'gray'
      })
      setTimeout(function() {
        callback()
      }, length == 2 ? 1000 : 3000 / length)
    }
  }
}

var tickets = []

var removeDuplicateNames = function(data) {
  // var seen = {}
  // return data.filter(function(d) {
  //   if (seen[d.name.toLowerCase()]) {
  //     return false
  //   }
  //   seen[d.name.toLowerCase()] = true
  //   return true
  // })
  return data
}

function shuffle(array) {
  var current = array.length, tempVal, random;

  // While there remain elements to shuffle
  while (0 !== current) {

    // Pick a random remaining element
    random = Math.floor(Math.random() * current);
    current -= 1;

    // Swap with current element
    tempVal = array[current];
    array[current] = array[random];
    array[random] = tempVal;
  }

  return array;
}

var makeTicketsWithPoints = function() {
  tickets = []
  $('.ticket').remove()
  map(shuffle(removeDuplicateNames(imported)), function(tdata) {
    if (excluded.indexOf(tdata.id) === -1) {
      var t = new Ticket(tdata.name, tdata.id)
      if (t.points > 0) t.dom.appendTo($('.wrapper'))
        tickets.push(t)
    }
  })
  tickets.reverse();
  size = 60
  $('.ticket').css('font-size', size + 'px')
  while (!elementInViewport(tickets[0].dom.get(0)) && size > 10) {
    size--
    $('.ticket').css('font-size', size + 'px')
  }

  $('#participant-number')
  .css('width', '')
  .text(tickets.length)
  setTimeout(function() {
    map(tickets, function(ticket) {
      ticket.fixPosition()
    })
    $(document)
    .unbind('keypress')
    .keypress(function(e) {
      if (e.keyCode === 13) {
        var width = $('#participant-number')
        .text(tickets.length + '/' + tickets.length)
        .width()
          $('#participant-number').css('width', width + 'px') //keep position consistent during countdown
          pickName()
        }
      })
  }, 500)
}

var getChoices = function() {
  var result = []
  map(tickets, function(ticket) {
    if (ticket.points > 0) result.push(ticket)
  })
  return result
}

$(window).resize(function() {
  if (!inProgress) makeTicketsWithPoints(tickets)
})

var pickName = function() {
  inProgress = true
  $('.ticket').unbind('click')
  $(document).unbind('keypress')

  var choices = getChoices()
  if (choices.length > 1) {
    var remove = Math.floor(Math.random() * choices.length)
    choices[remove].decrement(choices.length, function() {
      pickName()
    })
  } else {
    choices = $(choices[0].dom);
    $.ajax({
      type: 'POST',
      url: 'guests/' + choices.data('ref') + '/raffle',
      datatype: 'JSON',
      success: function(data) {
        imported = data.guests;
      },
      error: function(err) {
        console.log(err);
        imported = imported.filter(function(index) {
          return index.id != choices.data('ref')
        })
      }
    });
    var top = choices.css('top')
    var left = choices.css('left')
    var fontsize = choices.css('font-size')
    var width = choices.width()
    var id = choices.data('ref')
    var name = choices.text()
    Swal.fire({
      html: `
      <div style="text-shadow:2px 2px 3px black;font-size:35px;color:white;font-weight:bold;position:relative">CONGRATULATIONS</div>
      <div style="text-shadow:2px 2px 5px black;text-transform:uppercase;font-size:70px;color:white;font-weight:bold;margin-top:0%;position:relative;left:-20%;width:140%">${name}</div> 
      <br>
      </div>
      `,
      customClass: 'swal2-modal-md',
      showConfirmButton: false,
      background: 'none',
      // backdrop: 'url(../tykraffle/img/221513.jpg) 45% 10%/ 90% 100% no-repeat',
      backdrop: 'url(' + $('#bg').data('url') + ') center/ cover no-repeat',
      allowOutsideClick: false
    }).then(function() {
      inProgress = false
      $('.ticket>')
      .show(500)
      .unbind('click')
      setTimeout(function() {
        makeTicketsWithPoints(ticketNames, ticketPoints)
      }, 700)
    });
    // choices.animate(
    //   {
    //     'font-size': 5 * size + 'px',
    //     top: window.innerHeight / 5 + 150 + 'px',
    //     left: window.innerWidth / 2 - width + 'px'
    //   },
    //   1500,
    //   function() {
    //     choices.animate({ left: window.innerWidth / 2 - choices.width() / 2 - 10 + 'px' }, 'slow')
    //   }
    // )
  }
}