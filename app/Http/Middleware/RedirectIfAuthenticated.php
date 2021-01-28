<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        $guard = isset($guards[0]) ? $guards[0] : null;

        switch ($guard) {
           // In case of admin
            case 'admin':
                if (Auth::guard($guard)->check())
                {
                    return redirect(url('/admin/'));
                }
                break;
            // in case of artist
            case 'artist':
                if (Auth::guard($guard)->check())
                {
                    return redirect(url('/artist/'));
                }
                break;
            
            default: //in  case off user
                if (Auth::guard($guard)->check())
                {
                    return redirect(url('/home'));
                }
                break;
        }

        return $next($request);
    }
}
