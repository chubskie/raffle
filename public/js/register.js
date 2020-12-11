$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$(function() {
	Swal.fire({
		icon: 'info',
		title: 'Privacy Notice',
		text: 'The event organizers collected information from you as participants for the purposes of registration and overall event management. By providing your information, you are giving your consent to us to use your information for the aforementioned purposes. After conclusion of the event and completion of all necessary reports, your personal data will be saved in secured files for future references and networking activities. IF YOU DO NOT WISH TO BE CONTACTED FURTHER AFTER THIS EVENT, KINDLY INFORM THE ORGANIZERS.',
		confirmButtonText: 'Proceed',
	});

	$('form').submit(function(e) {
		e.preventDefault();
		$('input').attr('readonly', true);
		$('button').text('').append('<i class="fas fa-spinner fa-spin"></i>').attr('disabled', true);
		let data = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'register',
			data: data,
			datatype: 'JSON',
			success: function(response) {
				$('input').removeAttr('readonly');
				$('button').removeAttr('disabled');
				if (response.status == 'success') {
					Swal.fire({
						icon: 'success',
						title: response.msg,
						showConfirmButton: false,
						timer: 2500
					}).then(function() {
						$('input').val('');
						$('button').empty().text('SUBMIT').removeAttr('disabled');
					});
				}
			},
			error: function(err) {
				$('input').removeAttr('readonly');
				$('button').empty().text('SUBMIT').removeAttr('disabled');
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
