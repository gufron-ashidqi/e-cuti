<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user terautentikasi dan memiliki role 0 (admin)
        if (Auth::check() && Auth::user()->role === 1) {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman lain atau beri pesan error
        alert()->error('Gagal','Anda tidak memiliki akses ke halaman ini.');
        return redirect('/home');
    }
}
