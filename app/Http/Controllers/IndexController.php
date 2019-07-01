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

	public function logs(Request $request) {
		$total = Guest::all();
		$page = 0;

		if ($request->search) {
      // *
      //  * Different types of where functions: 
      //  * 
      //  * where('column', 'value') - default and simplest where function; Account::where()->where() = SELECT ... WHERE ... AND WHERE ...
      //  *      where('column', 'LIKE', 'value')
      //  * orWhere() - only exists after a self-standing where function; Account::where()->orWhere() = SELECT ... WHERE ... OR WHERE
      //  * whereYear(), whereMonth(), whereDate(), whereBetween() - where functions for dates
      //  * ...and many others
			
			$guests = Guest::where('first_name', 'LIKE', '%' . $request->search . '%')
			->orWhere('middle_initial', 'LIKE', '%' . $request->search . '%')
			->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
			->orWhere('college', 'LIKE', '%' . $request->search . '%')
			->orWhere('course', 'LIKE', '%' . $request->search . '%')
			->get();
			$page ++;
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
