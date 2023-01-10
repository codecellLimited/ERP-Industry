<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transection extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'transection_for',
        'party_id',
        'supplier_id',
        'order',
        'due',
        'payment_method',
        'account',
        'amount',
        'remark'
    ];
}
