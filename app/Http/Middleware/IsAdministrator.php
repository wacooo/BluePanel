<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdministrator {

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if(!$user)
            return redirect('/oauth/google');

        if ( !Auth::user()->isAdministrator())
        {
            if ($request->ajax())
            {
                return response('Forbbiden.', 403);
            }
            else
            {
                return response('Sorry but you aren\'t an adminlte :P', 403);
            }
        }

        return $next($request);
    }

}