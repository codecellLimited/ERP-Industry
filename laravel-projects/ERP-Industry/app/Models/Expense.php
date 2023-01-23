<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $fillable=[
        'datee',
        'purpose',
        'payment_method',
        'account',
        'amount',
        'remark'
    ];
}
