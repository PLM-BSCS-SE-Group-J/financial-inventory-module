<?php

namespace App\Imports;

use App\Models\fixed_assets;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new fixed_assets([
            'AccountNum' => $row[1],
            'ItemName' => $row[2],
            'AccountName' => $row[3],
            'Status' => $row[4],
            'dateAcquired' => $row[5],
            'OrigVal' => $row[6],
            'CurrentVal' => $row[7],
            'DepVal' => $row[8],
        ]);
    }
}
