<?php

// app/Models/Blog.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blog_category_id',
        'title',
        'slug',
        'thumbnail',
        'content',
        'published_at',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
