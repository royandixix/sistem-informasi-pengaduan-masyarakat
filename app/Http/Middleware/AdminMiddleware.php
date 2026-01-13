<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Jika belum login, redirect ke login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Jika login tapi bukan admin, logout dan redirect login
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akses admin saja.');
        }

        return $next($request);
    }
}
