<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Session;
// use Illuminate\Cookie\CookieJar;
class CheckValidArtist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // if(auth('artist')->user()->email_verified_at == '') { 

        //     auth('artist')->logout();
        //     return redirect()->route('artist.login')->with('status_err','Please Verify Your Email First');           
        // }
      
        // if(auth('artist')->user()->) {

        //     auth('artist')->logout();
        //     return redirect()->route('artist.login')->with('status_err','You are deleted by admin');              
        // }

        if (auth('artist')->user()->is_active == 0) {

            auth('artist')->logout();
            return redirect()->route('artist.login')->with('status_err','You are deactivated by admin. Please contact admin for more info');   
        }
        
        return $next($request);
    }
}