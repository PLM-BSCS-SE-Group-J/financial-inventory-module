<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allreports extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey ="ReportTitle";
    protected $keyType = "string";
    protected $fillable = [
        'ReportTitle',
        'EmpFirstName',
        'EmpLastName',
        'dateRequested',
        'dateIssued',
        'Remarks',
        'selectedAssets',
    ];
    protected $casts = [
        'selectedAssets' => 'array',
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';

    public function fixedAssets()
    {
        return $this->belongsToMany(fixed_assets::class, 'fixed_asset_report', 'report_id', 'asset_id');
    }
}