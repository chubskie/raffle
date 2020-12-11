$(function() {
	$('#logout').submit(function() {
		$('input').attr('readonly', true);
		$('button').attr('disbaled', true);
		$(this).find('button').empty().append('<i class="fas fa-spinner fa-spin"></i>');
	});
});