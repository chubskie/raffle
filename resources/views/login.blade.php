@extends('_layout')

@section('body')
<div class="row valign-wrapper center-align">
	<div class="col s12 m8 l6 offset-l3 offset-m2">
		<div class="card z-depth-3">
			<div class="card-content">
				<h4 class="center-align">LOGIN</h4>
				<form autocomplete="off">
					<div class="input-field">
						<input type="text" id="username" class="form-control validate" name="username" required>
						<label for="username">Username</label>
					</div>
					<div class="input-field">
						<input type="password" id="password" class="form-control validate" name="password" required>
						<label for="password">Password</label>
					</div>
					<p id="message" class="red-text"></p>
					<div class="center-align">
						<button class="btn waves-effect waves-green float-right" type="submit">Sign in</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script id="loginjs" src="{{ asset('js/login.js') }}" data-url="{{ route('dashboard') }}"></script>
@endsection