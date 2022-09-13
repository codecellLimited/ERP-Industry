<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcType extends Model
{
    use HasFactory;


    protected $fillable = [
        'image',
        'type',
        'describe',
        'describe_in_bangla',
        'slug',
        'ac_title_id',
    ];
}
