<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in AND if their role is exactly 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Let them through
        }

        // If they are not an admin, block them
        abort(403, 'Unauthorized action. Admins only.');
    }
}
