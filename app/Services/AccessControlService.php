<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;
use App\Models\Payment;

class AccessControlService
{
    /**
     * Check if a user has an ACTIVE subscription for a tier
     */
    public static function userHasActiveTier(User $user, string $tier): bool
    {
        return Payment::where('user_id', $user->id)
            ->where('tier', $tier)
            ->where('status', 'paid')
            ->where(function ($q) {
                $q->whereNull('subscription_expires_at')
                  ->orWhere('subscription_expires_at', '>', now());
            })
            ->exists();
    }

    /**
     * Check if a user can access a course
     */
    public static function userHasCourse(User $user, Course $course): bool
    {
        // 1️⃣ Free courses are accessible
        if ($course->is_free || $course->tier === 'free') {
            return true;
        }

        // 2️⃣ Course must have a tier
        if (! $course->tier) {
            return false;
        }

        // 3️⃣ Check active subscription
        return self::userHasActiveTier($user, $course->tier);
    }

    /**
     * Check if a user can access a program
     */
    public static function userHasProgram(User $user, string $tier): bool
    {
        // Free programs
        if ($tier === 'free') {
            return true;
        }

        return self::userHasActiveTier($user, $tier);
    }
}
