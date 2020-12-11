@extends('_layout')

@section('body')
<div class="card z-depth-3">
	<div class="card-content">
		<div class="row valign-wrapper">
			<div class="col s12 m8">
				<h5>List of All Guests (Total: <span id="total">{{-- {{ number_format(count($guests), 0, '.', ',') }} --}}</span>)</h5>
			</div>
			<div class="col s12 m4">
				<form id="logout" class="right-align" method="POST" action="{{ route('logout') }}">
					@csrf
					<button class="btn btn-flat waves-effect waves-red">
						<i class="fas fa-sign-out-alt pr-1"></i>
						<span>Sign Out</span>
					</button>
				</form>
			</div>
		</div>
		<form id="search">
			<div class="input-field" style="margin-top:30px">
				<input id="saerchbar" type="text" name="search">
				<label for="searchbar">Search</label>
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
<form class="modal">
	<div class="modal-content">
		<h4>Edit Guest</h4>
		<div class="input-field">
			<input type="text" id="name" class="validate" placeholder="First Name M.I. Last Name" required>
			<label for="name">Full Name</label>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn btn-flat waves-effect waves-red lighten-1 modal-close" type="button">Cancel</button>
		<button class="btn btn-flat waves-effect waves-green" type="submit">Submit</button>
	</div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/logs.js') }}"></script>
@endsection