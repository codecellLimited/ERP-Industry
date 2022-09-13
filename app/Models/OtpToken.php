<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpToken extends Model
{
    use HasFactory;


    protected $fillable = [
        'email',
        'phone',
        'token',
    ];


    protected $hidden = [
        'id',
        'updated_at',
    ];
}
