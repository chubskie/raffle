<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Freshmen Orientation</title>
	@include('_styles')
	@yield('styles')
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12 col-md-11 px-0">
				@yield('body')
			</div>
		</div>
	</div>
	@include('_scripts')
	@yield('scripts')
</body>
</html>