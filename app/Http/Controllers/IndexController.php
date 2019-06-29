<?php

namespace App\Http\Controllers;

use Auth;
use App\Guest;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function register() {
		return view('register');
	}

	public function logs() {
		$guests = Guest::orderBy('updated_at', 'desc')->get();
		return view('logs', [
			'guests' => $guests,
		]);
	}

	public function login() {
		$message = NULL;
		if(Auth::user()) {
			return redirect('logs');
		} else {
			return view('login', [
				'message' => $message
			]);
		}
	}
}
