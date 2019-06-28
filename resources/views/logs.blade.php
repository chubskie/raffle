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
								<tr>
									<td>Fernandez, Jobert</td>
									<td>BSCS</td>
									<td>CCSS</td>
									<td>8:30</td>
								</tr>
								<tr>
									<td>Kaye Ysabelle Dulay Rosacia</td>
									<td>BSCS</td>
									<td>CCSS</td>
									<td></td>
								</tr>
								<tr>
									<td>Camillo claro peter Angelo Pacquing Junior</td>
									<td>BSCS</td>
									<td>CCSS</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection