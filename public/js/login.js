$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});


$(function() {
	$('input').keyup(function() {
		$('#message').text('');
	});

	$('form').submit(function(e) {
		e.preventDefault();
		$('input').attr('readonly', true);
		$('button').text('').append('<i class="fas fa-spinner fa-spin"></i>').attr('disabled', true);
		let data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'login',
			data: data,
			datatype: 'JSON',
			success: function(response) {
				$('input').removeAttr('readonly');
				$('button').empty().text('SIGN IN').removeAttr('disabled');
				if (response.status == 'success') {
					Swal.fire({
						type: 'success',
						title: response.msg,
						showConfirmButton: false,
						timer: 2500
					}).then(function() {
						window.location.href = $('#loginjs').data('url');
					});
				} else {
					$('#message').text(response.msg);
					$('input').val('');
				}
			},
			error: function(err) {
				$('input').removeAttr('readonly');
				$('button').empty().text('SIGN IN').removeAttr('disabled');
				console.log(err);
				Swal.fire({
					type: 'error',
					title: 'Cannot Connect to Server',
					text: 'Something went wrong. Please try again later.'
				});
			}
		});
	});
});