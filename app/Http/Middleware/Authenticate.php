<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;
use Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }

        if ($request->expectsJson()) {
            // return response()->json([
            //     'status' => 403,
            //     'message' => "unauthenticated",
            // ], 200); 
        }

        if(Route::is('admin.*')) {
            return route('admin.login');
        }

        if(Route::is('artist.*')) {
            return route('artist.login');
        }

        return route('login');

    }
    
}
