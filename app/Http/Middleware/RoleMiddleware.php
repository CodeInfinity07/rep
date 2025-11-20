<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|array  $roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Please login to access this page.');
        }

        $userType = auth()->user()->type;
        
        if (!in_array($userType, $roles)) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
