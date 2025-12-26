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

        // 2️⃣ Redirect based on user tier (MUST return RedirectResponse)
        return match ($user->tier) {
            'free'    => redirect()->route('free-roadmap'),
            'pro'     => redirect()->route('pro-landing'),
            'premium' => redirect()->route('premium-landing'),
            default   => redirect()->route('pricing'),
        };
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
