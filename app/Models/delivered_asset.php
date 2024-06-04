<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delivered_asset extends Model
{
    use HasFactory;
    protected $table = 'delivered_asset';
    public $timestamps = false;
    protected $fillable = [
        'd_item_no',
        'd_description',
        'd_category',
        'AccountClass',
        'UseLife',
        'date',
        'd_unit_cost',
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
