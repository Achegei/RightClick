<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\AccessControlService;

class EnsureProgramAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $programSlug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ?string $programSlug = null): Response
    {
        // 1️⃣ Must be logged in
        if (! auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this content.');
        }

        $user = auth()->user();

        // 2️⃣ Check program access if a slug is provided
        if ($programSlug && ! AccessControlService::userHasProgram($user, $programSlug)) {
            // Optional: redirect to upgrade page instead of 403
            return redirect()->route('upgrade')
                             ->with('error', 'Upgrade required to access this program.');
        }

        // 3️⃣ Optionally: can enforce tier access here as well
        // Example: AccessControlService::userHasTier($user, 'pro');

        return $next($request);
    }
}
