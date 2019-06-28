@extends('_layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
@endsection

@section('body')
<div class="valign-center">
	<div class="container-fluid">
		<div class="row justify-content-md-center">
			<div class="col-sm-12 col-md-8 col-lg-6">
				<div class="card p-5">
					<h4 class="center-align mt-0">Login</h4>
					<form method="POST">
						{{ csrf_field() }}
						<div class="input-field">
							<input type="text" class="form-control validate" name="username" required>
							<label for="username">Username</label>
						</div>
						<div class="input-field mt-2">
							<input type="password" class="form-control validate" name="password" required>
							<label for="password">Password</label>
						</div>
						@if($message != NULL)
						<small>{{ $message }}</small>
						@endif
						<button class="btn mt-3 float-right" type="submit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection