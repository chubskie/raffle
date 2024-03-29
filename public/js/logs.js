$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	}
});

$(function() {
	function ajaxError(err) {
		console.log(err);
		Swal.fire({
			icon: 'error',
			title: 'Cannot Connect to Server',
			text: 'Something went wrong. Please try again later.'
		});
	}

	function delay(fn, ms) {
		let timer = 0
		return function(...args) {
			clearTimeout(timer)
			timer = setTimeout(fn.bind(this, ...args), ms || 0)
		}
	}

	function pagination(current, prev, next, lastpage) {
		$('tfoot').empty().append('<tr><td colspan="3"><ul class="pagination right"></ul></td></tr>');
		if (prev != null) $('.pagination').append('<li><button class="btn" data-url="' + prev + '"><i class="fas fa-chevron-left"></i></button></li>');
		if (next != null) $('.pagination').append('<li><button class="btn" data-url="' + next + '"><i class="fas fa-chevron-right"></i></button></li>');
		if (lastpage >= 3) $('.pagination').append('<li><form class="valign-wrapper"><div class="input-field inline"><input type="number" class="validate" min="1" max="' + lastpage + '" value="' + current + '" placeholder="Page #"></div><h6>/' + lastpage + '</h6></form></li>');
	}

	function retrieveGuests(search, link) {
		$('tbody').empty().append(`
			<tr id="loading">
			<td colspan="3" class="center-align">
			<i class="fas fa-spinner fa-spin"></i>
			<p>Loading Guests</p>
			</td>
			</tr>
			`);
		$('.pagination').remove();
		$('#total').text('');
		$.ajax({
			type: 'POST',
			url: link,
			data: {search:search, data:'logs'},
			datatype: 'JSON',
			success: function(data) {
				let table = '';
				console.log(data);
				if (data.guests.total === 0) {
					table += `
					<tr>
					<td colspan="3" class="center-align">
					<i class="fas fa-info-circle"></i>
					<p>No guests found</p>
					</td>
					</tr>
					`;
				} else {
					for (guest in data.guests.data) {
						table += `
						<tr>
						<td>${data.guests.data[guest].name}</td>
						<td>${data.guests.data[guest].timestamp}</td>
						<td class="right-align">
						<button class="btn waves-effect waves-white edit" data-id="${data.guests.data[guest].id}">
						<i class="fas fa-edit"></i>
						</button>
						<button class="btn waves-effect waves-red delete" data-id="${data.guests.data[guest].id}">
						<i class="fas fa-trash"></i>
						</button>
						</td>
						</tr>
						`;
					}
					if (data.guests.total > 50)
						pagination(data.guests.current_page, data.guests.prev_page_url, data.guests.next_page_url, data.guests.last_page);
					request = false;
				}
				$('tbody').empty().append(table);
				$('#total').text(data.guests.total);
			},
			error: function(err) {
				ajaxError(err);
				$('tbody').empty().append(`
					<tr id="loading">
					<td colspan="3" class="center-align">
					<i class="fas fa-info-circle"></i>
					<p>Cannot retrieve guests</p>
					</td>
					</tr>
					`);
			}
		});
	}

	var search = '', request = true, link = 'logs', currentPage = 1;
	$('.modal').modal();
	retrieveGuests(search, link);

	$('#logout').submit(function() {
		$('input').attr('readonly', true);
		$('button').attr('disabled', true);
		$(this).find('button').empty().append('<i class="fas fa-spinner fa-spin"></i>');
	});

	$('body').delegate('.delete', 'click', function() {
		Swal.fire({
			html: `<i class="fas fa-spinner fa-spin fa-lg"></i>`,
			showConfirmButton: false,
			allowOutsideClick: false,
			allowEscapeKey: false
		});
		let id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'guests/' + id,
			datatype: 'JSON',
			success: function(data) {
				Swal.fire({
					icon: 'warning',
					title: 'Confirm Delete',
					text: `Are you sure you want to delete ${data.guest.name}?`,
					showCancelButton: true,
					cancelButtonText: 'No',
					confirmButtonText: 'Yes'
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire({
							html: `<i class="fas fa-spinner fa-spin fa-lg"></i>`,
							showConfirmButton: false,
							allowOutsideClick: false,
							allowEscapeKey: false
						});
						$.ajax({
							type: 'POST',
							url: 'guests/' + id + '/delete',
							datatype: 'JSON',
							success: function(response) {
								Swal.fire({
									icon: response.status,
									title: response.msg,
									text: 'Registered user has been deleted.',
									showConfirmButton: false,
									timer: 2500
								}).then(function() {
									retrieveGuests(search, link);
									request = true;
								});
							},
							error: function(err) {
								ajaxError(err);
							}
						});
					}
				});
			},
			error: function(err) {
				ajaxError(err);
			}
		});
	});

	$('body').delegate('.edit', 'click', function() {
		Swal.fire({
			html: `<i class="fas fa-spinner fa-spin fa-lg"></i>`,
			showConfirmButton: false,
			allowOutsideClick: false,
			allowEscapeKey: false
		});
		let id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'guests/' + id,
			datatype: 'JSON',
			success: function(data) {
				$('#guest input').val(data.guest.name).attr('data-id', id);
				Swal.close();
				$('#guest').modal('open');
			},
			error: function(err) {
				ajaxError(err);
			}
		});
	});

	$('#guest').submit(function(e) {
		e.preventDefault();
		$('#guest').modal('close');
		Swal.fire({
			html: `<i class="fas fa-spinner fa-spin fa-lg"></i>`,
			showConfirmButton: false,
			allowOutsideClick: false,
			allowEscapeKey: false
		});
		let name = $('#guest input').val();
		$.ajax({
			type: 'POST',
			url: 'guests/' + $('#guest input').attr('data-id') + '/edit',
			data: {name:name},
			datatype: 'JSON',
			success: function(response) {
				Swal.fire({
					icon: response.status,
					title: response.msg,
					text: 'Registered user has been updated',
					showConfirmButton: false,
					timer: 2500
				}).then(function() {
					retrieveGuests(search, link);
					request = true;
				});
			},
			error: function(err) {
				ajaxError(err);
			}
		});
	});

	$('#search').submit(function(e) {
		e.preventDefault();
		search = $('#search input').val();
		link = 'logs';
		retrieveGuests(search, link);
		request = true;
	});

	$('#search input').keyup(delay(function() {
		if (!$('#loading').length) {
			if (!request) {
				$('#search').submit();
			}
		}
	}, 750));

	$('body').delegate('.pagination button', 'click', function(e) {
		e.preventDefault();
		let link = $(this).data('url');
		retrieveGuests(search, link);
		request = true;
	});

	$('body').delegate('.pagination form', 'submit', function(e) {
		e.preventDefault();
		let page = $(this).find('input').val();
		link = 'http://localhost/tykraffle/public/logs?page=' + page;
		retrieveGuests(search, link);
		request = true;
	});

	$('#import').click(function() {
		$('#excel input').val('');
		$('#excel').modal('open');
	});

	$('#excel').submit(function(e) {
		e.preventDefault();
		$('button').attr('disabled', true);
		$('input').attr('readonly', true);
		$('#excel button[type="submit"]').empty().append(`<i class="fas fa-spinner fa-spin"></i>`);
		var data = new FormData($('#excel')[0]);
		data.append('file', $('#file')[0].files[0]);
		$.ajax({
			type: 'POST',
			url: 'import',
			data: data,
			processData: false,
			contentType: false,
			datatype: 'JSON',
			success: function(response) {
				if (response.status == 'success') {
					$('button').removeAttr('disabled');
					$('input').removeAttr('readonly');
					$('#excel button[type="submit"]').empty().text('Submit');
					Swal.fire({
						icon: response.status,
						title: response.msg,
						showConfirmButton: false,
						timer: 2500
					}).then(function() {
						search = '', logs = '';
						$('#excel').modal('close');
						$('#file').val('');
						retrieveGuests(search, link);
						request = true;
					});
				}
			},
			error: function(err) {
				$('button').removeAttr('disabled');
				$('input').removeAttr('readonly');
				$('#excel button[type="submit"]').empty().text('Submit');
				ajaxError(err);
			}
		});
	});

	$('#file').change(function(e) {
		if (e.target.files.length > 0) {
			let valid = false, filename = e.target.files[0].name, validExtensions = ['.xlsx', '.xls', '.csv'];
			for (let i = 0; i < validExtensions.length; i++) {
				let extension = validExtensions[i];
				if (filename.substr(filename.length - extension.length, extension.length).toLowerCase() == extension.toLowerCase()) {
					valid = true;
					break;
				}
			}
			if (!valid) {
				Swal.fire({
					icon: 'error',
					title: 'Invalid File',
					text: 'Allowed files are: ' + validExtensions.join(', ')
				});
				$('#excel button[type="submit"]').attr('disabled', true);
			} else {
				$('#excel').submit();
			}
		}
	});

	$('#clear').click(function() {
		Swal.fire({
			icon: 'warning',
			title: 'Clear All Guests',
			text: 'Are you sure you want to clear the guests list?',
			showCancelButton: true,
			cancelButtonText: 'No',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire({
					html: `<i class="fas fa-spinner fa-spin fa-lg"></i>`,
					showConfirmButton: false,
					allowOutsideClick: false,
					allowEscapeKey: false
				});
				$.ajax({
					type: 'POST',
					url: 'guests/clear',
					datatype: 'JSON',
					success: function(response) {
						Swal.fire({
							icon: 'success',
							title: response.msg,
							showConfirmButton: false,
							timer: 2500
						}).then(function() {
							retrieveGuests(search, link);
							request = true;
						});
					},
					error: function(err) {
						ajaxError(err);
					}
				});	
			}
		});
	});
});