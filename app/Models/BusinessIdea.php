<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessIdea extends Model
{
    protected $fillable = [
        'title',
        'summary',
        'content',
        'is_premium',
        'status',
        'tier', // newly added
    ];

    /**
     * Comments relationship
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Check if a user can access this business idea
     *
     * @param \App\Models\User|null $user
     * @return bool
     */
    public function canAccess(?User $user): bool
    {
        if ($this->tier === 'free') {
            return true;
        }

        if (!$user) {
            return false; // not logged in cannot access pro/premium content
        }

        if ($this->tier === 'pro' && $user->hasActiveSubscription('pro')) {
            return true;
        }

        if ($this->tier === 'premium' && $user->hasActiveSubscription('premium')) {
            return true;
        }

        return false;
    }
}
