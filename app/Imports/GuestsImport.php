<?php

namespace App\Imports;

use App\Guest;
use Maatwebsite\Excel\Concerns\ToModel;

class GuestsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guest([
            'name' => $row[0]
        ]);
    }
}
