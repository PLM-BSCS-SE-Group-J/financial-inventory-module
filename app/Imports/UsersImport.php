<?php

namespace App\Imports;

use App\Models\fixed_assets;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new fixed_assets([
            'AssetCode' => $row[1],
            'AssetDesc' => $row[2],
            'AccountTitle' => $row[3],
            'AccountClass' => $row[4],
            'UseLife' => $row[5],
            'dateAcquired' => $row[6],
            'OrigCost' => $row[7],
            'NetbookVal' => $row[8],
            'status' => $row[9],
            'AccuDep' => $row[10],
            'MonthlyDep' => $row[11],
            'YearlyDep' => $row[12],
            'dateRetired' => $row[13],
            'PersonCharge' => $row[14],
        ]);
    }
}
