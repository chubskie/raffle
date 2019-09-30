<table>
	<thead>
		<tr>
			<th>Student Number</th>
			<th>Name</th>
			<th>College</th>
			<th>Year Level</th>
			<th>Course</th>
			<th>Contact Number</th>
		</tr>
	</thead>
	<tbody>
		@foreach($guests as $guest)
		<tr>
			<td>{{ $guest->student_number }}</td>
			<td>{{ $guest->last_name }}, {{ $guest->first_name }} @if($guest->middle_initial != null) {{ $guest->middle_initial }} @endif</td>
			<td>
				@if ($guest->college == 'law')
				College of Law
				@elseif ($guest->college == 'dent')
				College of Dentistry
				@elseif ($guest->college == 'cas')
				College of Arts and Sciences
				@elseif ($guest->college == 'cba')
				College of Business Administration
				@elseif ($guest->college == 'eng')
				College of Engineering
				@elseif ($guest->college == 'ccss')
				College of Computer Studies and Systems
				@elseif ($guest->college == 'educ')
				College of Education
				@elseif ($guest->college == 'cfad')
				College of Fine Arts, Architecture, and Design
				@else
				No College Available
				@endif
			</td>
			<td>{{ $guest->year_level }}</td>
			<td>{{ $guest->course }}</td>
			<td>{{ $guest->contact_number }}</td>
		</tr>
		@endforeach
		<tr></tr>
		<tr></tr>
		<tr>
			<td>Retrieved from CCSS RnD EMC Likharaya 2019 System</td>
		</tr>
		<tr>
			<td>{{ $timestamp }}</td>
		</tr>
	</tbody>
</table>