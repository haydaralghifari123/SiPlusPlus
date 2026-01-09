<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('backend.dashboard');
            }

            if ($user->hasRole('mitra')) {
                return redirect()->route('mitra.dashboard');
            }

            return redirect()->route('frontend.user.dashboard');
        }

        return $next($request);
    }
}
