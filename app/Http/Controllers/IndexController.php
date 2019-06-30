<?php

namespace App\Http\Controllers;

use Auth;
use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	public function register() {
		$year = Carbon::now('+8:00');
		return view('register', [
			'year' => $year,
		]);
	}

	public function logs() {
		$guests = Guest::orderBy('updated_at', 'desc')->paginate(50);
		$total = Guest::all();
		return view('logs', [
			'guests' => $guests,
			'total' => $total,
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
