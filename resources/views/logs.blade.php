@extends('_layout')

@section('body')
<div class="card z-depth-3">
	<div class="card-content">
		<div class="row valign-wrapper">
			<div class="col s12 m8">
				<h4>List of All Guests (Total: <span id="total">{{-- {{ number_format(count($guests), 0, '.', ',') }} --}}</span>)</h4>
			</div>
			<div class="col m4">
				<form id="logout" class="right-align" method="POST" action="{{ route('logout') }}">
					@csrf
					<button class="btn red">
						<i class="fas fa-sign-out-alt pr-1"></i>
						<span>Sign Out</span>
					</button>
				</form>
			</div>
		</div>
		<form id="search">
			<div class="input-field">
				<input type="text" name="search" placeholder="Search...">
			</div>
		</form>
		<table class="striped highlight responsive-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Time Registered</th>
					<th style="width:150px">Actions</th>
				</tr>
			</thead>
			<tbody></tbody>
			<tfoot></tfoot>
		</table>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/logs.js') }}"></script>
@endsection