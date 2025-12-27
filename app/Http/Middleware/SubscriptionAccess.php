<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SubscriptionAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null $requiredTier
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $requiredTier = null)
    {
        $user = $request->user();

        // Free content is always allowed
        if ($requiredTier === 'free') {
            return $next($request);
        }

        // If user is not logged in, redirect to upgrade / login
        if (!$user) {
            return redirect('/login')->with('error', 'Please log in to access this content.');
        }

        $subscription = $user->subscription;

        // If no subscription or expired
        if (!$subscription || !$subscription->isActive()) {
            return redirect('/upgrade')->with('error', 'You need an active subscription to access this content.');
        }

        // Access rules
        $tierHierarchy = ['free' => 0, 'pro' => 1, 'premium' => 2];
        $userTierLevel = $tierHierarchy[$subscription->tier] ?? 0;
        $requiredTierLevel = $tierHierarchy[$requiredTier] ?? 0;

        if ($userTierLevel < $requiredTierLevel) {
            return redirect('/upgrade')->with('error', 'Your subscription does not grant access to this content.');
        }

        return $next($request);
    }
}
