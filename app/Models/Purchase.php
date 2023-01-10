<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_date',
        'supplierID',
        'data',
        'transport_cost',
        'total_price',
        'total_paid',
        'due',
        'payment_method',
        'note',
        'image',
    ];

}
