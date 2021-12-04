@extends('_layout')

@section('body')
<div class="card z-depth-3">
	<div class="card-content">
		<div class="row valign-wrapper">
			<div class="col s12 m3">
				<h5>List of All Guests (Total: <span id="total">{{-- {{ number_format(count($guests), 0, '.', ',') }} --}}</span>)</h5>
			</div>
			<div class="col s12 m9">
				<div class="row valign-wrapper right">
					<div class="col">
						<a href="raffle" id="raffle" class="btn btn-flat waves-effect waves-blue">
							<i class="fas fa-ticket-alt"></i>
							<span>Raffle</span>
						</a>
					</div>
					<div class="col">
						<button id="import" class="btn btn-flat waves-effect waves-blue">
							<i class="fas fa-file-import"></i>
							<span>Import</span>
						</button>
					</div>
					<div class="col">
						<button id="clear" class="btn btn-flat waves-effect waves-red">
							<i class="fas fa-user-slash"></i>
							<span>Clear Guests</span>
						</button>
					</div>
					<div class="col">
						<form id="logout" method="POST" action="{{ route('logout') }}">
							@csrf
							<button class="btn btn-flat waves-effect waves-red">
								<i class="fas fa-sign-out-alt pr-1"></i>
								<span>Sign Out</span>
							</button>
						</form>
					</div>
				</div>
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
<form id="guest" class="modal">
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
<form id="excel" class="modal">
	<div class="modal-content">
		<h4>Import Guests</h4>
		<div class="file-field input-field">
			<div class="btn">
				<span>File</span>
				<input id="file" type="file" accept=".xls, .xlsx, .csv" name="file" required>
			</div>
			<div class="field-path wrapper">
				<input class="file-path validate" type="text">
			</div>
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