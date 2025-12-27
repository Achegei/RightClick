<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Program extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'duration_days',
        'description',
        'tier', // added tier
    ];

    // Courses in this program
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    // Users enrolled in this program
    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withTimestamps()
                    ->withPivot('expires_at');
    }

    /**
     * Check if a given user can access this program.
     *
     * @param  \App\Models\User|null  $user
     * @return bool
     */
    public function canAccess(?User $user = null)
    {
        $user = $user ?? Auth::user();

        if (!$user) {
            // Guests can only access free programs
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
