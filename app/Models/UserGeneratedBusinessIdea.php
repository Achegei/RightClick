<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserGeneratedBusinessIdea extends Model
{
    protected $table = 'user_generated_business_ideas';

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'status',
        'tier',
        'creator_share'
    ];

    // Creator relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Access rules
    public function canAccess($user = null)
    {
        $user = $user ?? auth()->user();
        $tier = strtolower(trim($this->tier));

        if ($tier === 'free') {
            return true;
        }

        if (!$user) {
            return false;
        }

        $activeTier = $user->activeTier();
        $hasSubscription = $user->hasActiveSubscription();

        if (!$hasSubscription) {
            return false;
        }

        if ($tier === 'pro' && in_array($activeTier, ['pro', 'premium'])) {
            return true;
        }

        if ($tier === 'premium' && $activeTier === 'premium') {
            return true;
        }

        return false;
    }
     
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
