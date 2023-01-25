<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'purchase_date',
        'purchase_receive_date',
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
