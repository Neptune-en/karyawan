<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityLog;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // ✅ Catat aktivitas login
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Login ke sistem', // Pastikan nama kolom sesuai
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Pengalihan ke halaman dashboard
            return redirect()->intended('/dashboard');
        }

        return redirect()->route('login')->withErrors('Login gagal. Periksa email dan password Anda.');
    }

    // Tampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique' => 'Akun dengan email ini sudah terdaftar.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Membuat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Akun Anda berhasil dibuat. Silakan login.');
    }

    // Proses logout
    public function logout()
    {
        // ✅ Catat aktivitas logout sebelum logout
        if (Auth::check()) {
            ActivityLog::create([
                'user_id' => Auth::id(),
                'activity' => 'Logout dari sistem', // Pastikan nama kolom sesuai
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        }

        Auth::logout();
        return redirect()->route('login');
    }
}
