<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'tier',
        'amount',
        'currency',
        'payment_provider',
        'reference',
        'status',
        'paid_at',
        'subscription_started_at',
        'subscription_expires_at',
        'source_blog_id',
        'api_ref',
        'payment_id',
        'payload',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
        'subscription_started_at' => 'datetime',
        'subscription_expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }
    
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function sourceBlog()
    {
        return $this->belongsTo(Blog::class, 'source_blog_id');
    }

    public function isActive(): bool
    {
        return $this->status === 'paid'
            && $this->subscription_expires_at
            && $this->subscription_expires_at->isFuture();
    }
}
