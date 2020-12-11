<?php

namespace App\Http\Controllers;

use App\Guest;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller {
	public function register() {
		$year = Carbon::now('+8:00');
		return view('register', [
			'year' => $year,
		]);
	}

	public function logs(Request $request) {
		$total = Guest::all();
		$page = 0;
		$counter = 0;

		if ($request->search) {
			$guests = Guest::where('first_name', 'LIKE', '%' . $request->search . '%')
			->orWhere('middle_initial', 'LIKE', '%' . $request->search . '%')
			->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
			->orWhere('college', 'LIKE', '%' . $request->search . '%')
			->orWhere('course', 'LIKE', '%' . $request->search . '%')
			->orWhere('year_level', 'LIKE', '%' . $request->search . '%')
			->get();

			$page++;
		} else {
			$guests = Guest::orderBy('updated_at', 'desc')->paginate(50);
		}

		return view('logs', [
			'guests' => $guests,
			'total' => $total,
			'request' => $request,
			'page' => $page,
		]);
	}

	public function login() {
		if (Auth::check())
			return redirect('logs');
		return view('login');
	}

	public function raffle() {
		$guests = Guest::all();
		return view('raffle', [
			'guests' => $guests,
		]);
	}
}
