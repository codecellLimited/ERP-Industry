<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'ac_title_in_english',
        'ac_title_in_bangla',
        'details_in_bangla',
        'details_in_english',
    ];

    public function actype()
    {
        return $this->hasMany(AcType::class);
    }
}
