<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KioskLockoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $request->session()->put('lockout', true);
        }
        if ($request->session()->get('lockout')) {
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}
