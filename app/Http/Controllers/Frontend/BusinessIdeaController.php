<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BusinessIdea;
use Illuminate\Support\Facades\Auth;

class BusinessIdeaController extends Controller
{

    public function index()
{
    $businessIdeas = \App\Models\BusinessIdea::where('status', 'published')
        ->orderBy('created_at', 'desc')
        ->paginate(10); // or get() if no pagination

    return view('frontend.business-ideas.index', compact('businessIdeas'));
}
    public function show(BusinessIdea $businessIdea)
    {
        $user = Auth::user();

        $businessIdea->isUnlocked =
            $businessIdea->tier === 'free'
            || ($user && $user->hasUnlocked($businessIdea))
            || (
                $user &&
                $user->subscription?->isActive() &&
                in_array($businessIdea->tier, ['free', $user->subscription->tier])
            );

        return view('frontend.business-ideas.show', compact('businessIdea'));
    }
    
}
