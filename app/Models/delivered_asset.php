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
        'd_date_of_delivery',
        'd_unit_cost',
        'NetbookVal',
        'status',
        'AccuDep',
        'MonthlyDep',
        'YearlyDep',
        'dateRetired',
        'PersonCharge',
        'd_supplier',
        'd_pr_no',
        'd_po_no',
        'd_invoice_no',
        'd_date_invoice',
        'd_place_of_delivery',
    ];
    protected $dateFormat = 'Y-m-d H:i:sO';
}
