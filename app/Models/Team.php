<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'email',
        'phone',
        'designation',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'status',
    ];
}
