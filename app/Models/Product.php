<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'catagory_id',
        'brand_id',
        'unit_id',
        'price',
        'image',
        'description'
    ];
}
