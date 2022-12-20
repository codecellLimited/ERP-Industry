<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_date',
        'party_id',
        'product_id',
        'quantity',
        'unit_id',
        'unit_price',
        'discount',
        'total_discount',
        'total',
        'grand_total',
        'tax',
        'quotation_note',
        'quotation_status'
    ];
}
