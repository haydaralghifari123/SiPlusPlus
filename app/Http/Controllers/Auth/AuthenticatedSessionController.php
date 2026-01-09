<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = auth()->user();

        // ADMIN
        if ($user->hasRole('admin')) {
            return redirect()->route('backend.dashboard');
        }

        // MITRA
        if ($user->hasRole('mitra')) {
            return redirect()->route('mitra.dashboard');
        }

        // USER BIASA
        return redirect()->route('frontend.user.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
