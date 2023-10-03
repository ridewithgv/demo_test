<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class GuestMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Session::has('user') && Session::has('access_token') && Session::has('refresh_token')) {
            // User is authenticated, redirect to dashboard or home
            return redirect(route('admin.dashboard')); // Change this to your desired route
        }

        // User is a guest, proceed with the request
        return $next($request);
    }
}
