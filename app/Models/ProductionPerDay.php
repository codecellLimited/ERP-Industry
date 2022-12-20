<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionPerDay extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'product_name',
        'unit_id',
        'party_id',
        'production',
        'production_date',
        'remark',
        'image',
        'party_id',
        'order_id'
    ];
}
