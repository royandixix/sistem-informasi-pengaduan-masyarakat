<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (!Auth::check()) {

            // 👉 JIKA AKSES ADMIN
            if ($request->is('admin/*')) {
                return redirect()->route('admin.login');
            }

            // 👉 JIKA AKSES MASYARAKAT
            if ($request->is('masyarakat/*')) {
                return redirect()->route('masyarakat.login');
            }

            // 👉 DEFAULT
            return redirect()->route('masyarakat.login');
        }

        return $next($request);
    }
}
