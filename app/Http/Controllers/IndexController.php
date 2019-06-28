<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function register() {
		return view('register');
	}

	public function logs() {
		$guests = Guest::All();
		return view('logs', [
			'guests' => $guests
		]);
	}

	public function login() {
		return view('login');
	}
}
