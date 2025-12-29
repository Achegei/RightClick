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

    // Use existing helper methods
    $activeTier = $user->activeTier(); // 'free', 'pro', 'premium'
    $hasSubscription = $user->hasActiveSubscription(); // boolean

    if (!$hasSubscription) {
        return false;
    }

    // Access rules
    if ($tier === 'pro' && in_array($activeTier, ['pro', 'premium'])) {
        return true;
    }

    if ($tier === 'premium' && $activeTier === 'premium') {
        return true;
    }

    return false;
}

}
