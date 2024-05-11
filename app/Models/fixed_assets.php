<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fixed_assets extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'AssetCode',
        'AssetDesc',
        'AccountTitle',
        'AccountClass',
        'UseLife',
        'dateAcquired',
        'OrigCost',
        'NetbookVal',
        'status',
        'AccuDep',
        'MonthlyDep',
        'YearlyDep',
        'dateRetired',
        'PersonCharge',
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';
}
