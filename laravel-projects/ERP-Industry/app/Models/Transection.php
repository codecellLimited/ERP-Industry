<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transection extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'purpose',
        'party_id',
        'supplier_id',
        'order_id',
        'due',
        'payment_method',
        'account',
        'amount',
        'remark'
    ];
}
