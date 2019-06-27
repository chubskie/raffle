@extends('_layout')

@section('body')
<div class="mt-5">
	<div class="card w-50 m-auto">
		<div class="card-header">
			<h4 class="text-center">Freshmen Orientation</h4>
		</div>
		<div class="card-body">
			<h5 class="text-center">Register Here</h5>
			<hr>
			@include('_form')
		</div>
	</div>
</div>
@endsection