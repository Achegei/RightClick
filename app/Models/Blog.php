<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concerns\HasTierAccess;

class Blog extends Model
{
    use HasFactory, HasTierAccess;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'slug',
        'published_at',
        'tier',
        'series',
        'series_order',
        'featured',
        'cta_text',
        'cta_link',
        'seo_title',
        'meta_description',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured' => 'boolean',
    ];

    /** Scope published blogs */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
                     ->where('published_at', '<=', now());
    }

    /** Polymorphic comments */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /** Blog CTA events */
    public function ctaEvents()
    {
        return $this->hasMany(BlogCTAEvent::class);
    }
}
