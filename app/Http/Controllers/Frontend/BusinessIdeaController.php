<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BusinessIdea;
use Illuminate\Support\Facades\Auth;

class BusinessIdeaController extends Controller
{
    public function index()
    {
        $businessIdeas = BusinessIdea::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // or ->get() if no pagination

        return view('frontend.business-ideas.index', compact('businessIdeas'));
    }

    public function show(BusinessIdea $businessIdea)
    {
        $user = Auth::user();

        // Determine if the idea is accessible
        $canAccess = $businessIdea->tier === 'free'
            || ($user && $user->hasUnlocked($businessIdea))
            || (
                $user &&
                $user->subscription?->isActive() &&
                in_array($businessIdea->tier, ['free', $user->subscription->tier])
            );

        // Optional: also keep isUnlocked for internal use
        $businessIdea->isUnlocked = $canAccess;

        // Pass both $businessIdea and $canAccess to the view
        return view('frontend.business-ideas.show', compact('businessIdea', 'canAccess'));
    }
}
