<?php

namespace App\Http\Controllers\Artist\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    public function showLoginForm()
    {
        return view('artist.auth.login');
    }
    
    protected $redirectTo = RouteServiceProvider::ARTIST;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:artist')->except('logout');
      
    }

    protected function guard()
    {
        return Auth::guard('artist');   
    }

    public function logout()
    {
       Auth::guard('artist')->logout();
       return redirect('/artist/login');
    }
}
