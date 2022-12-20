<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'department_id',
        'image',
        'nid_image',
        'nid_no',
        'id_no',
        'designation_id',
        'work_shift_name',
        'daily_salary',
        'monthly_salary',
        'email',
        'phone',
        'gender',
        'marital_status',
        'address',
        'emergency_name',
        'emergency_contact',
        'date_of_leave',
        'date_of_birth',
        'date_of_joining',
        'religion',
        'status'
    ];
}
