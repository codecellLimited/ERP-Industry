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
        'total_price',
        'data',
        'quotation_note',
        'note'
        
    ];
}
