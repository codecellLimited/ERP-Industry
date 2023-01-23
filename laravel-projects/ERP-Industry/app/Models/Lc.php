<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lc extends Model
{
    use HasFactory;

    protected $fillable=[
        'pi_number',
        'pi_date',
        'pi_value',
        'party_id',
        'received_bdt',
        'status_bdt',
        'lc_number',
        'lc_date',
        'bank_id',
        'amd_no_date',
        'submitted_date',
        'maturity_date',
        'ldbc_number',
        'purchase_amount'
    ];
}
