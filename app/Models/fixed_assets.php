<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fixed_assets extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'AccountNum',
        'ItemName',
        'AccountName',
        'Status',
        'dateAcquired',
        'OrigVal',
        'CurrentVal',
        'DepVal'
    ];
}
