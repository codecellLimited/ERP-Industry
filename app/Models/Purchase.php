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
        'material_id',
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
        'purchase_note',
        
    ];

}
