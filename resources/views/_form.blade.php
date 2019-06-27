@section('styles')
@endsection

<form method="POST">
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col-md-5 pl-0">
			<input type="text" class="form-control validate" id="last_name" required>
			<label for="last_name">Last Name</label>
		</div>
		<div class="input-field col-md-5 pl-0">
			<input type="text" class="form-control validate" id="first_name" required>
			<label for="first_name">First Name</label>
		</div>
		<div class="input-field col-md-2 pl-0">
			<input type="text" class="form-control" id="middle_initial">
			<label for="midde_initial">M.I.</label>
		</div>
	</div>
	<div class="row">
		
		<div class="input-field col-md-5 pl-0">
			<select id="college" class="w-10 validate" required>
				<option value="" disabled selected>Select your college</option>
				<option value="law">College of Law</option>
				<option value="dentistry">College of Dentistry</option>
				<option value="cas">College of Arts and Sciences</option>
				<option value="cba">College of Business Administration</option>
				<option value="engineering">College of Engineering</option>
				<option value="ccss">College of Computere Studies and Systems</option>
				<option value="educ">College of Education</option>
				<option value="cfad">College of Fine Arts, Architecture and Design</option>
			</select>
			<label for="college">College</label>
		</div>
		<div class="input-field col-md-7 pl-0">
			<input type="text" class="form-control validate" id="course" required>
			<label for="course">Course</label>
		</div>
	</div>
	<div class="w-100">
		<button class="btn-large btn-primary w-25">Submit</button>
	</div>
</form>