<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display the login form.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Process user login.
     */
    public function signin(Request $request)
    {
        // Validasi input
        $credentials = $request->only('email', 'password');

        // dd($credentials);

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Arahkan ke halaman sesuai status
            if ($user->status === 'admin') {
                return redirect()->route('adminDashboard')->with('success', 'Login berhasil sebagai admin!');
            } elseif ($user->status === 'dosen' || $user->status === 'teknisi') {
                return redirect()->route('dosenDashboard')->with('success', 'Login berhasil sebagai ' . $user->status . '!');
            } else {
                // Jika status tidak valid, logout
                Auth::logout();
                return back()->withErrors([
                    'status' => 'Status pengguna tidak valid.',
                ])->onlyInput('email');
            }
        }

        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout berhasil!');
    }

    /**
     * Process user logout.
     */
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();
    //     return redirect('/login')->with('success', 'Logout berhasil!');
    // }
}
