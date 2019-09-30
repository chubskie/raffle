<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use Carbon\Carbon;
use App\Exports\GuestsExport;

class ReportController extends Controller
{
	public function export() {
		$timestamp = Carbon::now();

		return Excel::download(new GuestsExport, 'EMC Likharaya 2019 Data - ' . $timestamp . '.xlsx');
	}
}
