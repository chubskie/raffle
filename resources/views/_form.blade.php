<form method="POST">
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col-sm-4 pl-0">
			<input type="text" class="form-control validate" id="student_number" name="student_number" required>
			<label for="student_number">Student Number</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col-sm-5 pl-0">
			<input type="text" class="form-control validate" id="last_name" name="last_name" required>
			<label for="last_name">Last Name</label>
		</div>
		<div class="input-field col-sm-5 pl-0">
			<input type="text" class="form-control validate" id="first_name" name="first_name" required>
			<label for="first_name">First Name</label>
		</div>
		<div class="input-field col-sm-2 pl-0">
			<input type="text" class="form-control" id="middle_initial" name="middle_initial">
			<label for="midde_initial">M.I.</label>
		</div>
	</div>
	<div class="row">
		
		<div class="input-field col-sm-8 pl-0">
			<select id="college" type="text" name ="college" class="w-10 validate" required>
				{{-- <option value="undefined">Not Specified (Ticket)</option> --}}
				<option value="law">College of Law</option>
				<option value="ccss">College of Computer Studies and Systems</option>
				<option value="dent">College of Dentistry</option>
				<option value="cas">College of Arts and Sciences</option>
				<option value="cba">College of Business Administration</option>
				<option value="eng">College of Engineering</option>
				<option value="educ">College of Education</option>
				<option value="cfad">College of Fine Arts, Architecture and Design</option>
			</select>
			<label for="college">College</label>
		</div>
		<div class="input-field col-sm-3 pl-0">
			<input type="text" class="form-control validate" id="course" name="course" required>
			<label for="course">Course</label>
		</div>


	</div>
	<div class="row">
		<div class="input-field col-sm-8 pl-0">
			<select id="year_level" type="text" name ="year_level" class="w-10 validate" required>
				{{-- <option value="undefined">Not Specified (Ticket)</option> --}}
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
			<label for="year_level">Year Level</label>
		</div>
		<div class="input-field col-sm-3 pl-0">
			<input type="text" class="form-control validate" id="contact_number" name="contact_number" required>
			<label for="contact_number">Contact Number</label>
		</div>

	<div class="w-100 center-align">
		<button class="btn-large btn w-50" type="submit">Submit</button>
	</div>
</form>