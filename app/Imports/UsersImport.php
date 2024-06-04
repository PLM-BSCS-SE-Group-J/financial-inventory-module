<?php

namespace App\Imports;

use App\Models\delivered_asset;
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
        return new delivered_asset([
            'd_item_no' => $row[1],
            'd_description' => $row[2],
            'd_category' => $row[3],
            'AccountClass' => $row[4],
            'UseLife' => $row[5],
            'd_date_of_delivery' => $row[6],
            'd_unit_cost' => $row[7],
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
