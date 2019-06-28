@section('styles')
<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
@endsection

<form method="POST">
	{{ csrf_field() }}
	<div class="row">
		<div class="input-field col-md-5 pl-0">
			<input type="text" class="form-control validate" id="last_name" name="last_name" required>
			<label for="last_name">Last Name</label>
		</div>
		<div class="input-field col-md-5 pl-0">
			<input type="text" class="form-control validate" id="first_name" name="first_name" required>
			<label for="first_name">First Name</label>
		</div>
		<div class="input-field col-md-2 pl-0">
			<input type="text" class="form-control" id="middle_initial" name="middle_initial">
			<label for="midde_initial">M.I.</label>
		</div>
	</div>
	<div class="row">
		<div class="input-field col-md-4 pl-0">
			<input type="text" class="form-control validate" id="course" name="course" required>
			<label for="course">Course</label>
		</div>
		<div class="input-field col-md-8 pl-0">
			<select id="college" class="w-10 validate" required>
				<option>College of Law</option>
				<option>College of Dentistry</option>
				<option>College of Arts and Sciences</option>
				<option>College of Business Administration</option>
				<option>College of Engineering</option>
				<option>College of Computer Studies and Systems</option>
				<option>College of Education</option>
				<option>College of Fine Arts, Architecture and Design</option>
			</select>
			<label for="college">College</label>
		</div>
	</div>
	<div class="w-100 center-align">
		<button class="btn-large btn w-50" type="submit">Submit</button>
	</div>
</form>

@section('scripts')
<script src="{{ asset('js/validator.js') }}"></script>
@endsection