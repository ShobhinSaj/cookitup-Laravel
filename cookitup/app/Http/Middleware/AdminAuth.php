<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user is the admin (user ID 1)
        if ($request->user()->id !== 1) {
            abort(403); // Or redirect to unauthorized page
        }

        return $next($request);
    }
}
