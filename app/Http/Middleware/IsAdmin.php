<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // DD ($request -> user);
        if (! $request->user()->isAdmin || $request->user()==null) {
            return response()->json(['message' => 'Your are not an administrator.'], 409);
        }

        return $next($request);
    }
}
