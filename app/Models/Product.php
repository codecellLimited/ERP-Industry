<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 
        'product_name', 
        'description', 
        'price', 
        'quantity', 
        'colors', 
        'sizes', 
        'slug',
        'product_code',
        'item',
    ];

    protected $hidden = [
        'status',
        'slug',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Image()
    {
        return $this->hasMany(ProductImg::class);
    }
}
