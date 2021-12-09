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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@700&display=swap" rel="stylesheet">
	<title>Raffle System</title>
	<style>
		html, body {
			background-color: black;
			/*background: url('{{ asset('img/splashBG5.jpg') }}');*/
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: center;
				overflow-x :hidden;
			}
		</style>
	</head>
	<body>
		<div class="header" style="overflow-x:auto; margin-bottom:15px">
			<span style="margin-left:15px">Participants: <span id="participant-number"></span></span>
			<span style="margin-left:25px">Previous Winners: <span id="winners"></span></span>
		</div>
		<div class="wrapper"></div>
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/materialize.min.js') }}"></script>
		<script src="{{ asset('js/jquery-ui-1.8.23.custom.min.js') }}"></script>
		<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
		<script src="{{ asset('js/raffle.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
		<script>
			var imported = @json($guests);
			var winners = @json($winners);
			var names = [];
			if (winners.length > 0) {
				for (winner of winners)
					names.push(winner.name);
				$('#winners').append(names.join(', '));
			}
			$('.enter-names').hide();
			makeTicketsWithPoints();
		</script>
		<script id="bg" data-url="{{ asset('img/winnerBG.PNG') }}"></script>
	</body>
	</html>
