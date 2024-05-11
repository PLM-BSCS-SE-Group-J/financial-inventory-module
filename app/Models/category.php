<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'AccountTitle',
    ];

    
}
