<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credit extends Model
{
    use HasFactory;
    protected $fillable=[
        'date',
        'debit_by',
        'pay_via',
        'amount',
        'account',
        'remark',
        'image'
    ];


}
