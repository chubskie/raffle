<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Raffle System</title>
	@include('_styles')
	@yield('styles')
</head>
<body>
	<main>
		<div class="container">
			@yield('body')
		</div>
	</main>
	@if(!Request::is('login') && (!Request::is('logs')))
	<footer class="page-footer">
		<div class="footer-copyright">
			<div class="container">
				Copyright ©{{ \Carbon\Carbon::parse($year, 'UTC')->isoFormat('YYYY') }}. Research and Development Unit.
			</div>
		</div>
	</footer>
	@endif
	
	@include('_scripts')
	@yield('scripts')
</body>
</html>
