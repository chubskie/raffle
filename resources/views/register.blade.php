@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
@endsection

@section('body')
<div class="row valign-wrapper center-align">
	<div class="col l6 m8 s12 offset-l3">
		<div class="card z-depth-3">
			<div class="card-content">
				<h4 class="text-center">REGISTER HERE</h4>
				<form autocomplete="off">
					<div class="input-field">
						<input type="text" class="validate" id="name" name="name" required>
						<label for="name">Full Name</label>
					</div>
					<div class="center-align">
						<button class="btn-large btn waves-effect waves-green" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endsection