<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        // Pass the 'next' query parameter to the view if present
        $next = $request->query('next', null);

        return view('auth.register', compact('next'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create the user with default tier 'free'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tier' => 'free', // ensure tier is set
        ]);

        event(new Registered($user));

        // Log in the user
        Auth::login($user);

        // Determine redirect URL
        $next = $request->input('next');

        if (!$next) {
            // Redirect based on user tier
            $next = match($user->tier) {
                'free' => route('free-roadmap'),
                'pro' => route('pro-landing'),
                'premium' => route('premium-landing'),
                default => route('free-roadmap'),
            };
        }

        // Ensure we return a proper RedirectResponse
        return redirect()->to($next);
    }
}
