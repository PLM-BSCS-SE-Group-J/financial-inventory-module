<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\acc_class;

class account extends Model
{
    use HasFactory;
    protected $table='accounts';
    protected $fillable = [
        'id',
        'd_category',
    ];
}
