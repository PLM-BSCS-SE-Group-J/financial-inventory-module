<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\account;

class acc_class extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'AccountClass',
        'UseLife',
    ];
    
}
