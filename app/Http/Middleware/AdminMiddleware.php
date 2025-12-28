<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('admin')->user(); // <-- explicitly use admin guard

        if (!$user || $user->role_id !== 1) {
            abort(403, 'Admins only');
        }

        return $next($request);
    }
}
