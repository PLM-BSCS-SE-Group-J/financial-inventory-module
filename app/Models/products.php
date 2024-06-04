<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categories;
class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'd_category',
        'AccountClass',
        'UseLife',
    ];

}
