<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'tier',                    // pro | premium
        'amount',
        'currency',
        'payment_provider',
        'reference',
        'status',                  // pending | paid | failed | refunded
        'paid_at',
        'subscription_started_at',
        'subscription_expires_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'subscription_started_at' => 'datetime',
        'subscription_expires_at' => 'datetime',
    ];

    /**
     * Payment belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Optional: payment may be tied to a program
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Helper: check if this payment grants active access
     */
    public function isActive(): bool
    {
        return $this->status === 'paid'
            && $this->subscription_expires_at
            && $this->subscription_expires_at->isFuture();
    }
}
