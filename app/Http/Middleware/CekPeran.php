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
    public function handle(Request $request, Closure $next, ...$daftarPeran): Response
    {
        // Cek apakah user sudah login
    if (!auth()->check()) {
        return redirect('/login');
    }

    // Cek apakah peran user ada di dalam daftar yang diizinkan
    if (in_array(auth()->user()->peran, $daftarPeran)) {
        return $next($request);
    }

    abort(403, 'Anda tidak memiliki akses');
    }
}
