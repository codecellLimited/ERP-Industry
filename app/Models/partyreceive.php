<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partyreceive extends Model
{
    use HasFactory;

    protected $fillable=[
        'date',
        'party',
        'method',
        'account',
        'amount',
        'remark'
    ];
}
