<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/raffle.css') }}">
	<link rel="shortcut icon" href="{{ asset('img/UElogo.png') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
	<title>Raffle System</title>
	<style>
		html, body {
			background-color: black;
			background: url('{{ asset('img/splashBG4.jpg') }}');
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center;
			overflow:hidden !important;
		}
	</style>
</head>
<body>
	<div class="wrapper"></div>
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/materialize.min.js') }}"></script>
	<script src="{{ asset('js/jquery-ui-1.8.23.custom.min.js') }}"></script>
	<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('js/raffle.js') }}"></script>
	<script>
		var imported = @json($guests);
		$('.enter-names').hide();
		makeTicketsWithPoints();
	</script>
	<script id="bg" data-url="{{ asset('img/splashBG4.jpg') }}"></script>
</body>
</html>
