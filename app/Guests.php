<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guests extends Model
{
	protected $fillable = [
		'last_name',
		'first_name',
		'middle_initial',
		'course',
		'college'
	];
}
