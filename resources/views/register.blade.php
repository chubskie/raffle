@extends('_layout')

@section('body')
<div class="mt-5 pt-3">
	<div class="container-fluid">
		<div class="row justify-content-md-center">
			<div class="col-sm-12 col-md-6">
				<div class="card">
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
		</div>
	</div>
</div>
@endsection