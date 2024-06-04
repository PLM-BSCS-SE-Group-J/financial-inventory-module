<?php

namespace App\Exports;

use App\Models\delivered_asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return delivered_asset::all();
    }
    public function headings() :array
    {
        return ["ID", "Asset Code", "Asset Description","Account Title", "Account Classification", "Use Life", "Date Acquired", "Original Cost", "Netbook Value","Status", "Accumulated Depreciation", "Yearly Depreciation", "Monthly Depreciation", "Date Retired", "Person In Charge"];
    }

    public function styles(Worksheet $sheet)
    {
        return[
        1 => ['font'=>['bold'=>true]],
        ];
    }
}
