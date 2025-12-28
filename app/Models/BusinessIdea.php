<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class BusinessIdea extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'status',
        'tier', // free | pro | premium
    ];

    /**
     * Route model binding via slug
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Comments (polymorphic)
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Determine if a user can access this idea
     */
    public function canAccess(?User $user): bool
    {
        // Free content → always accessible
        if ($this->tier === 'free') {
            return true;
        }

        // Guest → blocked
        if (! $user) {
            return false;
        }

        // One-time unlock (purchase)
        if (method_exists($user, 'hasUnlocked') && $user->hasUnlocked($this)) {
            return true;
        }

        // Active subscription
        $subscription = $user->subscription;

        if (! $subscription || ! $subscription->isActive()) {
            return false;
        }

        // Premium → access everything
        if ($subscription->tier === 'premium') {
            return true;
        }

        // Pro → access pro only
        if ($subscription->tier === 'pro' && $this->tier === 'pro') {
            return true;
        }

        return false;
    }
}
