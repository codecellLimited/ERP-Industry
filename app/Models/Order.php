<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;


    protected $fillable = [
        'party_id',
        'order_date',
        'order_delivary_date',
        'data',
        'total_price',
        'transport_cost',
        'total_paid',
        'due',
        'payment_method',
        'note',
        'image'
    ];
}
