<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'slug',
    ];

    protected $hidden = [
        'id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function posts()
    {
        return $this->hasMany(Blog::class);
    }
}
