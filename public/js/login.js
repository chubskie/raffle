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
				$('button').empty().text('SIGN IN');
				if (response.status == 'success') {
					Swal.fire({
						icon: 'success',
						title: response.msg,
						showConfirmButton: false,
						timer: 2500
					}).then(function() {
						window.location.href = $('#loginjs').data('url');
					});
				} else {
					$('input').val().removeAttr('readonly');
					$('button').removeAttr('disabled');
					$('#message').text(response.msg);
					$('input').val('');
				}
			},
			error: function(err) {
				$('input').removeAttr('readonly');
				$('button').empty().text('SIGN IN').removeAttr('disabled');
				console.log(err);
				Swal.fire({
					icon: 'error',
					title: 'Cannot Connect to Server',
					text: 'Something went wrong. Please try again later.'
				});
			}
		});
	});
});