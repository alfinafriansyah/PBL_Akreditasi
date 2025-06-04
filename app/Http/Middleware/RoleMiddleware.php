<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role->role_kode ?? null;

        // Jika role user ada di daftar role yang diizinkan
        if ($userRole && in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika tidak punya akses
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
