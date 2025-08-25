<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $userRole = session('user_role', 'guest');

        // Jika tidak ada roles yang ditentukan, izinkan akses
        if (empty($roles)) {
            return $next($request);
        }

        // Admin punya akses ke semua
        if ($userRole === 'admin') {
            return $next($request);
        }

        // Cek apakah role user ada dalam daftar roles yang diizinkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika role tidak diizinkan, tampilkan error 403
        abort(403, 'Unauthorized action. Anda tidak memiliki akses ke halaman ini.');
    }
}
