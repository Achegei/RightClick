<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tier',        // 'pro' or 'premium'
        'started_at',
        'expires_at',
        'status',      // 'active', 'expired'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    // Subscription belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper to check if active
    public function isActive(): bool
    {
        return $this->status === 'active' && $this->expires_at >= now();
    }
}
