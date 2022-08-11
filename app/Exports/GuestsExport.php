<?php

namespace App\Exports;

use App\Guest;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class GuestsExport implements FromView, ShouldAutoSize, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 35,
            'C' => 30
        ];
    }

    public function view(): View
    {
    	return view('_export', [
    		'guests' => Guest::orderBy('updated_at', 'desc')->get(),
    		'timestamp' => Carbon::now()->isoFormat('MMMM D, YYYY - h:mm a')
    	]);
    }
}
