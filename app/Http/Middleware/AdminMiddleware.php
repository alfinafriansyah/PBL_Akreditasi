<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ← Tambahkan baris ini
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role_id == 10) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak. Hanya admin yang boleh masuk.');
    }
}
