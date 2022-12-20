<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    use HasFactory;

    protected $fillable=[
        'employee_id',
        'name',
        'type',
        'date_from',
        'date_to',
        'total_days',
        'remark'
    ];
}
