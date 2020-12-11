@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
@endsection

@section('body')
<div class="mt-5 pt-3">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-6">
				<div class="card z-depth-3" id="bg">
					<div class="card-header">
						<h4 class="text-center">REGISTER HERE</h4>
					</div>
					<div class="card-body">
						<form autocomplete="off">
							<div class="input-field">
								<input type="text" class="form-control" id="name" name="name" required>
								<label for="name">Full Name</label>
							</div>
							<div class="w-100 center-align">
								<button class="btn-large btn w-50" type="submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/register.js') }}"></script>
@endsection