<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'slug',
        'published_at',
    ];

    // Optional: cast published_at to a datetime
    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Scope to only published blogs
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
