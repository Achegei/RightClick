<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasTierAccess;
use App\Models\Comment; // Make sure Comment model exists and is imported

class Blog extends Model
{
    use HasFactory, HasTierAccess;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'slug',
        'published_at',
        'tier',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

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
