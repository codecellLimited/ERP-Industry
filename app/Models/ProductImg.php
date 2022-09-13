<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    use HasFactory;

    protected $fillable = ['products_id', 'file_name', 'file_path', 'file_size', 'file_type'];
}
