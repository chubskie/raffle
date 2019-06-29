$(document).ready(function() {
	$("select").material_select();

  // for HTML5 "required" attribute
  $('select[required]').css({
  	display: 'inline',
  	position: 'absolute',
  	float: 'left',
  	padding: 0,
  	margin: 0,
  	border: '1px solid red',
  	height: 0, 
  	width: 0,
  	top: '2em',
  	left: '3em'
  });
});