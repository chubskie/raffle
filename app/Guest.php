<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
	protected $fillable = [
		'student_number',
		'last_name',
		'first_name',
		'middle_initial',
		'college',
		'course',
		'year_level', 
		'contact_number'
	];

	protected $attributes = array(
		'year_level' => '1'

	);
}
