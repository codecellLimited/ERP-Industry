<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialProduction extends Model
{
    use HasFactory;

    protected $fillable=[
        'receiver',
        'name',
        'quality',
        'quantity',
        'unit',
        'code'
    ];
}
