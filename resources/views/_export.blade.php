<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Time Registered</th>
		</tr>
	</thead>
	<tbody>
		<tr></tr>
		<tr>
			<td colspan="3">RAFFLE WINNERS</td>
		</tr>
		@foreach ($guests as $guest)
		@if ($guest->raffle == true)
		<tr>
			<td>{{ $guest->id }}</td>
			<td>{{ $guest->name }}</td>
			<td>{{ \Carbon\Carbon::parse($guest->updated_at)->isoFormat('MMMM D, YYYY - h:mm a') }}</td>
		</tr>
		@endif
		@endforeach

		<tr></tr>
		<tr></tr>
		<tr>
			<td colspan="3">RAFFLE REGISTERS</td>
		</tr>
		@foreach ($guests as $guest)
		@if ($guest->raffle == false)
		<tr>
			<td>{{ $guest->id }}</td>
			<td>{{ $guest->name }}</td>
			<td>{{ \Carbon\Carbon::parse($guest->created_at)->isoFormat('MMMM D, YYYY - h:mm a') }}</td>
		</tr>
		@endif
		@endforeach
		<tr></tr>
		<tr></tr>
		<tr>
			<td>Retrieved from UE-CCSS RnD Unit Raffle System</td>
		</tr>
		<tr>
			<td>{{ $timestamp }}</td>
		</tr>
	</tbody>
</table>