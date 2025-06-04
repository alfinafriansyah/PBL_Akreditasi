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
            $roleKode = $user->role->role_kode ?? null;

            // Cek role_id untuk admin
            if ($user->role_id == 10) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil (Admin)',
                    'redirect' => url('/admin/dashboard'),
                ]);
            }

            // Kriteria 1-9
            if (in_array($roleKode, ['KRT1','KRT2','KRT3','KRT4','KRT5','KRT6','KRT7','KRT8','KRT9'])) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil (Kriteria)',
                    'redirect' => url('/kriteria/dashboard'),
                ]);
            }

            // Koordinator
            if ($roleKode == 'KOOR') {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil (Koordinator)',
                    'redirect' => url('/koordinator/dashboard'),
                ]);
            }

            // KPSKAJUR
            if ($roleKode == 'KPSKAJUR') {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil (KPS / KAJUR)',
                    'redirect' => url('/kpskajur/dashboard'),
                ]);
            }

            // KJM
            if ($roleKode == 'KJM') {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil (KJM)',
                    'redirect' => url('/kjm/dashboard'),
                ]);
            }

            // Direktur
            if ($roleKode == 'DIR') {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil (Direktur)',
                    'redirect' => url('/direktur/dashboard'),
                ]);
            }
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
