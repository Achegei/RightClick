<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Video extends Model
{
    protected $fillable = [
        'title',
        'youtube_id',
        'description',
        'tier', // added tier
    ];

    /**
     * Check if a given user can access this video.
     *
     * @param  \App\Models\User|null  $user
     * @return bool
     */
    public function canAccess(?User $user = null)
    {
        $user = $user ?? Auth::user();

        if (!$user) {
            // Guests can only access free videos
            return $this->tier === 'free';
        }

        if ($this->tier === 'free') {
            return true;
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
