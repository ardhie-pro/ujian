<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekStatusUser
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Kalau belum login
        if (!$user) {
            return redirect()->route('login');
        }

        // Kalau status "review", arahkan ke halaman review
        if ($user->status === 'review' && !$request->is('review*')) {
            return redirect()->route('review.index');
        }

        // Kalau status "aktif" (admin/dsb) lanjut
        return $next($request);
    }
}
