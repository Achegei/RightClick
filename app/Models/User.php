<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // =========================
    // ACCESS CONTROL HELPERS
    // =========================

    public function isFree(): bool
    {
        return $this->account_type === 'free';
    }

    public function isPro(): bool
    {
        return in_array($this->account_type, ['pro', 'premium']);
    }

    public function isPremium(): bool
    {
        return $this->account_type === 'premium';
    }

    /**
     * Generic tier comparison
     * free < pro < premium
     */
    public function hasAtLeast(string $required): bool
    {
        $levels = [
            'free' => 1,
            'pro' => 2,
            'premium' => 3,
        ];

        return ($levels[$this->account_type] ?? 0) >= ($levels[$required] ?? 0);
    }

    // =========================
    // RELATIONSHIPS
    // =========================

    /**
     * Programs the user is enrolled in
     */
    public function programs()
    {
        return $this->belongsToMany(Program::class, 'enrollments')
            ->withPivot('expires_at')
            ->withTimestamps();
    }

    /**
     * User enrollments
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Payments made by the user
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Certificates earned
     */
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function role()
{
    return $this->belongsTo(Role::class);
}

public function subscription()
{
    return $this->hasOne(Subscription::class)->latest();
}

}
