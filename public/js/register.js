$('button[type="submit"]').onClick(function(e) {
	e.preventDefault();

	var last_name = $('input#last_name').val();
	var first_name = $('input#first_name').val();
	var middle_initial = $('input#middle_initial').val();
	var course = $('input#course').val();
	var college = $('select#college').val();

	$.ajax({
		type: "POST",
		url: "",
		data: {
			last_name = last_name;
			first_name = first_name;
			middle_initial = middle_initial;
			course = course;
			college = college;
		},
		cache: false,
		success: function(data) {
			console.log('Gotem');
		},
		error: function(data) {
			console.log('Fail');
		}
	});
});