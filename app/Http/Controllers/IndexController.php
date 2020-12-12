<?php

namespace App\Http\Controllers;

use Auth;
use App\Guest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller {
	public function login() {
		if (Auth::check())
			return redirect('logs');
		return view('login');
	}

	public function raffle() {
		$guests = Guest::whereNull('raffle')->inRandomOrder()->limit(100)->get();
		return view('raffle', [
			'guests' => $guests,
		]);
	}
}
