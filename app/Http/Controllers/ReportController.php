<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;
use App\Imports\GuestsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GuestsExport;

class ReportController extends Controller
{
	public function export() {
		$timestamp = Carbon::now()->isoFormat('MMMM D, YYYY - h:mm a');

		return Excel::download(new GuestsExport, 'Alumni Homecoming Raffle 2021 Data - ' . $timestamp . '.xlsx');
	}

	public function import(Request $request) {
		Excel::import(new GuestsImport, $request->file);

		return response()->json([
			'status' => 'success',
			'msg' => 'Import Successful'
		]);
	}
}
