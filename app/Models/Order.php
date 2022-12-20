<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'order_delivery_date',
        'party_id',
        'product_id',
        'quantity',
        'unit_id',
        'unit_price',
        'discount',
        'total_discount',
        'transport_cost',
        'grand_total',
        'total_paid',
        'total_due',
        'payment_method',
        'order_note',
        'image'
        
    ];
}
