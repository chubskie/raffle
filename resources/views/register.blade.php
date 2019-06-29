@extends('_layout')

@section('body')
<div class="mt-5 pt-3">
	<div class="container-fluid">
		<div class="row justify-content-md-center">
			<div class="col-sm-12 col-lg-7">
				<div class="card">
					<div class="card-header">
						<h4 class="text-center">WELCOME, FRESHMEN!</h4>
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

{{-- <p>The event organizers collected information from you as participants for the purposes of registration and overall event management. By providing your information you are giving your consent to us to use your information for the aforementioned purposes.</p>
<p>After conclusion of the event and completion of all necessary reports, your personal data will be saved in secure files for future reference and networking activities.</p>
<p> IF YOU DO NOT WISH TO BE CONTACTED FURTHER AFTER THIS EVENT, KINDLY INFORM THE ORGANIZERS.</p> --}}
@endsection