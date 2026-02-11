<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekPeran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $peranYangDiizinkan): Response
    {
        // Cek apakah pengguna sudah login dan memiliki peran yang sesuai
        if (auth()->check() && auth()->user()->peran === $peranYangDiizinkan) {
            return $next($request);
        }

        // Jika tidak punya akses, lempar ke halaman lain atau beri error 403
        abort(403, 'Anda tidak memiliki akses ke halaman ini.');
    }
}
