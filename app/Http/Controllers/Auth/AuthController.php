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
    // REGISTER (ADMIN SAJA)
    // =====================
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>['required','confirmed', PasswordRule::defaults()],
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'admin', // admin default
        ]);

        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success','Akun admin berhasil dibuat.');
    }

    // =====================
    // LOGIN (ADMIN SAJA)
    // =====================
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);

        if(Auth::attempt($request->only('email','password'), $request->filled('remember'))){
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')->with('success','Login berhasil, selamat datang Admin!');
        }

        return back()->with('error','Email atau password salah.');
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success','Berhasil logout.');
    }
}
