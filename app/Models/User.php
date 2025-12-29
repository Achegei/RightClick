<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Payment;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Mass assignable attributes
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'account_type', // free | pro | premium
        'role_id',
    ];

    /**
     * Hidden attributes
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // =====================================
    // TIER & ACCESS CONTROL (CANONICAL)
    // =====================================

    /**
     * Returns the currently active tier for the user.
     * Falls back to `account_type`, then 'free'.
     */
    public function tier(): string
    {
        $tier = $this->activeTier();

        return $tier ?? $this->account_type ?? 'free';
    }

    public function isFree(): bool
    {
        return $this->tier() === 'free';
    }

    public function isPro(): bool
    {
        return in_array($this->tier(), ['pro', 'premium']);
    }

    public function isPremium(): bool
    {
        return $this->tier() === 'premium';
    }

    /**
     * free < pro < premium
     */
    public function hasAtLeast(string $requiredTier): bool
    {
        $levels = [
            'free' => 1,
            'pro' => 2,
            'premium' => 3,
        ];

        return ($levels[$this->tier()] ?? 0) >= ($levels[$requiredTier] ?? 0);
    }

    /**
     * Returns true if user has a paid active subscription
     */
    public function hasActiveSubscription(): bool
    {
        return $this->isPro(); // pro or premium
    }

    // =====================================
    // PAYMENTS & SUBSCRIPTION LOGIC
    // =====================================

    /**
     * All payments by user
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Latest payment that has a valid subscription period
     */
    public function latestPayment()
    {
        return $this->hasOne(Payment::class)
            ->whereNotNull('subscription_started_at')
            ->latest('subscription_started_at');
    }

    /**
     * Determine the currently active tier from payments
     */
    public function activeTier(): ?string
    {
        $payment = $this->latestPayment;

        if (!$payment) {
            return null;
        }

        // Check if subscription is still valid
        if ($payment->subscription_expires_at && Carbon::parse($payment->subscription_expires_at)->isFuture()) {
            return $payment->tier;
        }

        return null;
    }

    // =====================================
    // RELATIONSHIPS
    // =====================================

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'enrollments')
            ->withPivot('expires_at')
            ->withTimestamps();
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    // =====================================
    // CONTENT UNLOCKS (ONE-OFF OVERRIDES)
    // =====================================

    public function contentUnlocks()
    {
        return $this->hasMany(UserContentUnlock::class);
    }

    /**
     * Final gatekeeper for any tiered content
     */
    public function hasUnlocked($content): bool
    {
        // Free content is always accessible
        if ($content->tier === 'free') {
            return true;
        }

        // Tier-based access
        if ($this->hasAtLeast($content->tier)) {
            return true;
        }

        // Individual content unlock
        return $this->contentUnlocks()
            ->where('content_type', strtolower(class_basename($content)))
            ->where('content_id', $content->id)
            ->exists();
    }
}
