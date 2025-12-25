<?php

namespace App\Services;

use App\Models\User;
use App\Models\Course;

class AccessControlService
{
    /**
     * Check if a user has access to a program
     */
    public static function userHasProgram(User $user, string $programSlug): bool
    {
        return $user->programs()
                    ->where('slug', $programSlug)
                    ->exists();
    }

    /**
     * Check if a user can access a course
     */
    public static function userHasCourse(User $user, Course $course): bool
    {
        // 1️⃣ Free courses are accessible to everyone
        if ($course->is_free) {
            return true;
        }

        // 2️⃣ Ensure course belongs to a program
        if (! $course->program) {
            return false;
        }

        // 3️⃣ Check if user has access to the program
        return self::userHasProgram($user, $course->program->slug);
    }

    /**
     * Optional: check if user has access based on tier
     */
    public static function userHasTier(User $user, string $tier): bool
    {
        // Example: Pro/Premium
        return $user->programs()
                    ->where('tier', $tier)
                    ->exists();
    }
}
