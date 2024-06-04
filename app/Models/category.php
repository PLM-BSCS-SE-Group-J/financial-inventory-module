<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;

class categories extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'd_category',
    ];

    
}
