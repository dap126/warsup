<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->is_verified) {
                if (Auth::user()->role === 'admin') {
                    return redirect()->intended('dashboard');
                }
                return redirect()->intended('/');
            }

            Auth::logout();
            return back()->withErrors([
                'username' => 'Akun Anda belum diverifikasi oleh admin.',
            ])->onlyInput('username');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'role' => 'user',
            'is_verified' => false,
            'password' => Hash::make($request->password),
        ]);

        // Auth::login($user); // Do not login, wait for verification

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan tunggu verifikasi admin.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
