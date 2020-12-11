<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function login(Request $request) {
		$credentials = $request->only(['username', 'password']);
		if(Auth::attempt($credentials)) {
			return response()->json([
				'status' => 'success',
				'msg' => 'Log In Successful'
			]);
		}
		return response()->json([
			'status' => 'error',
			'msg' => 'Invalid username and/or password'
		]);
	}

	public function logout(Request $request) {
		Auth::logout();
		return redirect('login');
	}
}
