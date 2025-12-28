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
        'tier',
    ];

    /**
     * Check if the given user can access this story.
     */
    public function canAccess($user = null)
{
    $user ??= auth()->user();

    $tier = strtolower(trim($this->tier));

    if ($tier === 'free') {
        return true; // everyone can access free content
    }

    if (!$user) {
        return false; // not logged in can't access pro/premium
    }

    $subscription = $user->subscriptions()->latest()->first();

    if (!$subscription) {
        return false;
    }

    if ($tier === 'pro' && $subscription->plan === 'pro') {
        return true;
    }

    if ($tier === 'premium' && $subscription->plan === 'premium') {
        return true;
    }

    if ($tier === 'pro' && $subscription->plan === 'premium') {
        return true;
    }

    return false;
}
}
