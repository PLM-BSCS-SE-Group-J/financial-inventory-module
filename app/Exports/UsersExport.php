<?php

namespace App\Exports;

use App\Models\fixed_assets;
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
        return fixed_assets::all();
    }
    public function headings() :array
    {
        return ["ID", "Item Code", "Item Name","Category", "Status", "Date Acquired", "Original Value", "Current Value", "Depreciation Value"];
    }

    public function styles(Worksheet $sheet)
    {
        return[
        1 => ['font'=>['bold'=>true]],
        ];
    }
}
