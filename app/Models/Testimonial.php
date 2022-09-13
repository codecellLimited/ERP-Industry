<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'name',
        'position',
        'content',
        'content_in_bangla',
    ];
}
