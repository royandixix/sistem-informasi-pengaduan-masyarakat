<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;

class AuthController extends Controller
{
    // =====================
    // TAMPILAN REGISTER ADMIN
    // =====================
    public function showRegister()
    {
        return view('auth.register');
    }

    // =====================
    // PROSES REGISTER ADMIN
    // =====================
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>['required','confirmed', PasswordRule::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        Auth::login($user, true);

        return redirect()->route('admin.dashboard')
            ->with('success','Akun admin berhasil dibuat dan langsung login.');
    }

    // =====================
    // TAMPILAN LOGIN ADMIN
    // =====================
    public function showLogin()
    {
        return view('auth.login');
    }

    // =====================
    // PROSES LOGIN ADMIN
    // =====================
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        // Hanya admin
        if(Auth::attempt(
            $request->only('email','password') + ['role'=>'admin'],
            $request->filled('remember')
        )){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')
                             ->with('success','Login berhasil, selamat datang Admin!');
        }

        return back()->with('error','Email atau password salah.');
    }

    // =====================
    // LOGOUT ADMIN
    // =====================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success','Berhasil logout.');
    }
}
