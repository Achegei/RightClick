<?php

namespace App\Models\Concerns;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait HasTierAccess
{
    public function canAccess(?User $user = null): bool
    {
        $user = $user ?? Auth::user();

        // Free content → always accessible
        if ($this->tier === 'free') {
            return true;
        }

        // Guest trying to access paid content
        if (!$user) {
            return false;
        }

        // Pro content
        if ($this->tier === 'pro' && $user->hasActiveSubscription('pro')) {
            return true;
        }

        // Premium content
        if ($this->tier === 'premium' && $user->hasActiveSubscription('premium')) {
            return true;
        }

        return false;
    }

    public function isLocked(?User $user = null): bool
    {
        return ! $this->canAccess($user);
    }
}
