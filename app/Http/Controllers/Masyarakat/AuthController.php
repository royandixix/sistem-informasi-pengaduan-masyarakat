<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // =====================
    // LOGIN DARI MODAL
    // =====================
    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'remember' => 'nullable|boolean',
        ]);

        $remember = $request->has('remember');

        // LOGIN dengan email + password (role dicek setelah login)
        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $request->session()->regenerate();

            // Pastikan role masyarakat
            if (Auth::user()->role !== 'masyarakat') {
                Auth::logout();
                return back()->with('error', 'Akun ini bukan masyarakat.');
            }

            return back()->with('success', 'Login berhasil, selamat datang, ' . Auth::user()->name . '!');
            
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // =====================
    // REGISTER DARI MODAL
    // =====================
    public function registerProcess(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'masyarakat',
            'email_verified_at' => now(),
        ]);

        // Login otomatis
        Auth::login($user, true);

        return back()->with('success', 'Registrasi berhasil dan login, selamat datang, ' . $user->name . '!');
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return back()->with('success', 'Berhasil logout.');
    }
}
