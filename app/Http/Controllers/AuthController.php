<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        if(Auth::check()) { //Jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }

    public function postlogin(Request $request) {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek role_id untuk admin
            if ($user->role_id == 10) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil (Admin)',
                    'redirect' => url('/admin/dashboard'),
                ]);
            }

            // Redirect default untuk user biasa
            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'redirect' => url('/'), // bisa diganti ke route user dashboard jika perlu
            ]);
        }

        // Login gagal
        return response()->json([
            'status' => false,
            'message' => 'Login Gagal. Username atau password salah.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Hapus session pengguna

        $request->session()->invalidate(); // Nonaktifkan session
        $request->session()->regenerateToken(); // Buat ulang token CSRF

        return redirect('/login')->with('message', 'Berhasil logout.');
    }

}
