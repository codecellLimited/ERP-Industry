<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplierpayment extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'name',
        'method',
        'account',
        'amount',
        'remark'
    ];
}
