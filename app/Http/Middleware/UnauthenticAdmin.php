<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnauthenticAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (!empty(Auth::user()) && Auth::user()->user_type  === 'admin'){
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
