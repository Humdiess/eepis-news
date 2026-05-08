<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'user_id',
    'category_id',
    'title',
    'slug',
    'content'
    'video'
])]

class Post extends Model
{
    use HasFactory;

    /**
     * Relasi ke user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}