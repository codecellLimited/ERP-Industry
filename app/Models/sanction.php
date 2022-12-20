<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanction extends Model
{
    use HasFactory;

    protected $fillable = [
        'sanction_date',
        'purpose',
        'amount',
        'sanction_note',
    ];
}
