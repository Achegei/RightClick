<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'featured_image',
        'status',
        'tier', // 'free', 'pro', or 'premium'
    ];

    // Optional: add a helper to check access
    public function isAccessibleBy($userTier)
    {
        $tiers = ['free' => 0, 'pro' => 1, 'premium' => 2];

        return $tiers[$userTier] >= $tiers[$this->tier];
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
