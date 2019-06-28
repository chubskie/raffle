@extends('_layout')

@section('body')
<div class="container-fluid">
	<div class="row justify-content-md-center">
		<div class="col-12 col-sm-12">
			
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col">
							<h3 class="ml-3">Logs</h3>
						</div>
						<div class="col valign-wraper">
							<a href="{{ url('/login') }}" class="btn btn-danger float-right my-auto"><i class="fas fa-sign-out-alt pr-1"></i>Sign out</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive-sm table-responsive-md">
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
								@foreach($guests as $guest)
								<tr>
									<td>{{ $guest->last_name }}, {{ $guest->first_name }} @if($guest->middle_initial != NULL){{ $guest->middle_initial }}@endif</td>
									<td>{{ $guest->course }}</td>
									<td>{{ $guest->college }}</td>
									<td>{{ $guest->created_at }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection