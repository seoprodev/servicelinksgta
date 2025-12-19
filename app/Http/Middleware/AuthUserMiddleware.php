<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserMiddleware
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        // Check login
        if (!Auth::check()) {
            return redirect()->route('front.home')->with('error', 'Please login first.');
        }

        $authUser = Auth::user();

        // Agar user_type match nahi karta
        if (!empty($types) && !in_array($authUser->user_type, $types)) {
            abort(403, 'Unauthorized access.');
        }

        // Share with all views
        view()->share('authUser', $authUser);

        // Attach in request (optional)
        $request->merge(['authUser' => $authUser]);

        return $next($request);
    }
}
