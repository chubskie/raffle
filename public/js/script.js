$(function() {
	$('form').submit(function(e) {
		$(this).find('button[type="submit"]')
		.addClass('disabled')
		.html('<i class="fas fa-spin fa-hotdog"></i>')
	});
});

$(document).ready(function(){
	$('select').formSelect();
});
