<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): View
    {
        // Capture optional "next" redirect target
        $next = $request->query('next');

        return view('auth.login', compact('next'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        // 1️⃣ Highest priority: explicit next URL
        if ($request->filled('next')) {
            return redirect()->to($request->input('next'));
        }

        $user = Auth::user();
        $subscription = $user->subscription;

        // 2️⃣ Active subscription → redirect by tier
        if ($subscription && $subscription->isActive()) {
            return match ($subscription->tier) {
                'premium' => redirect()->route('premium-roadmap'),
                'pro'     => redirect()->route('pro-roadmap'),
                default   => redirect()->route('free-roadmap'),
            };
        }

        // 3️⃣ No subscription or expired → Free access
        return redirect()->route('free-roadmap');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
