<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (session()->has('access_token')) {
            // User is authenticated, proceed with the request
            return $next($request);
        }

        // User is not authenticated, redirect to login page
        return redirect(route('admin.login'))->with('error', 'Unauthorized. Please login to access the page.');
    }
}