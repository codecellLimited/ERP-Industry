<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialProduction extends Model
{
    use HasFactory;

    protected $fillable=[
        'receiver',
        'material_id',
        'quality',
        'quantity',
        'unit',
        'code',
        'remark'
    ];
}
