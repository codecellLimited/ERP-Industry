<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'title_in_bangla',
        'content',
        'content_in_bangla',
        'admin_id',
        'tags',
        'category_id',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function Image()
    // {
    //     return $this->hasMany(ProductImg::class);
    // }
}
