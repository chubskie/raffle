@extends('_layout')

@section('body')
<div class="card mt-3">
	<div class="card-header">
		<div class="row">
			<div class="col-8">
				<h3 class="ml-3">List of All Guests (Total: {{ count($guests) }})</h3>
			</div>
			<div class="col-4 align-middle">
				<a href="{{ url('/logout') }}" class="btn btn-danger float-right my-auto"><i class="fas fa-sign-out-alt pr-1"></i>Sign out</a>
			</div>
		</div>
	</div>
	<div class="card-body px-0">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Course</th>
						<th scope="col">College</th>
						<th scope="col">Time Registered</th>
					</tr>
				</thead>
				<tbody>
					@if(count($guests) > 0)
					@foreach($guests as $guest)
					<tr>
						<td>{{ $guest->last_name }}, {{ $guest->first_name }} @if($guest->middle_initial != NULL){{ $guest->middle_initial }}@endif</td>
						<td>{{ $guest->course }}</td>
						<td>@switch($guest->college)
							@case('law')
							College of Law
							@break
							@case('dent')
							College of Dentistry
							@break
							@case('cas')
							College of Arts and Sciences
							@break
							@case('ccss')
							College of Computer Studies and Systems
							@break
							@case('cba')
							College of Business Administration
							@break
							@case('eng')
							College of Engineering
							@break
							@case('educ')
							College of Education
							@break
							@case('cfad')
							College of Fine Arts, Architecture and Design
							@break
							@endswitch
						</td>
						<td>{{ \Carbon\Carbon::parse($guest->created_at, 'UTC')->isoFormat('MMMM D, YYYY - h:mm a') }}</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td><h5>No Guests Found.</h5></td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection