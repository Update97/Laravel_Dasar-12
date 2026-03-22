<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (!$request->user()) {
        // Jika belum login, lempar ke halaman login
        return redirect('/login');
    }
    // pengecekan agar middleware tidak melakukan redirect lagi jika user sudah berada di halaman verifikasi
    if ($request->is('verify*')){
        return $next($request);
    }

    // 2.Cek status Jika sudah login
    if ($request->user()->status == 'active') {
        return $next($request);
    } 
    
    // Request untuk status verify dan akan diarahkan ke halaman verifikasi
    if ($request->user()->status == 'verify' || $request->user()->status == 'verifying') {
        return redirect('/verify');
    }

    // Default jika status lain (misal banned)
    return redirect('/login')->with('error', 'Akun Anda tidak aktif.');
        
    }
}
