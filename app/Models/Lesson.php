<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'content',

        // Roadmap structure
        'phase',        // Discovery, Skill Building, Client Acquisition
        'lesson_type',  // mindset, strategy, skill, execution, system
        'action_step',  // What the user must DO
        'outcome',      // Expected result after completion

        // Access & ordering
        'tier',         // free, pro, premium
        'order',
        'status',       // draft, published
    ];

    /* =========================
     | Relationships
     ========================= */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /* =========================
     | Query Scopes
     ========================= */

    // Only visible lessons
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Order lessons correctly inside a phase
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    // Filter by tier (free/pro/premium)
    public function scopeForTier($query, string $tier)
    {
        return $query->where('tier', $tier);
    }

    // Filter by roadmap phase
    public function scopePhase($query, string $phase)
    {
        return $query->where('phase', $phase);
    }

    /* =========================
     | Helpers
     ========================= */

    public function isFree(): bool
    {
        return $this->tier === 'free';
    }

    public function isPro(): bool
    {
        return $this->tier === 'pro';
    }

    public function isPremium(): bool
    {
        return $this->tier === 'premium';
    }
}
