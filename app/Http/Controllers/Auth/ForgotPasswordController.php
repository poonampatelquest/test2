<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\Artist\ForgotPasswordMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('user.auth.forget-password');
    }

    // public function sendPasswordInMail(Request $reuest)
    // {
    //     return 1;
    //     // $request->validate(['email' => 'required|email']);
    //     // return view('User.auth.forget-password');
    // }

    public function sendPasswordInMail(Request $request)
    {
        $this->validateEmail($request);

        $user = User::where('email',$request->email)->first();
        if(is_null($user)){
            return back()->with('status_err', "We can't find any User with this email address.");     
        }

        if($user->is_active == 0) {
            
            return back()->with('status_err', 'You are deactivated By admin.For more info contact admin.');
        }

        // $token = $user->token;

        $password = rand(9999999, 99999999);
        $data = array('Name' => $user->name, "password" => $password);

        try {

            Mail::to($request->email)->send(new ForgotPasswordMail($data));
            if (Mail::failures()) {
                $message = "Something went wrong. Please try again later.";
                return redirect()->back()->with('status_err',$message);
            }

            $user->password = Hash::make($password);
            $user->save();
            return redirect()->back()->with('status', "New Password is send to you in your mail. Please check.");

        }catch(Execption $e) {

            $message = "Something went wrong. Please try again later.";
            return redirect()->back()->with('status_err',$message);
        }  
    }

    protected function validateEmail(Request $request)
    {
        $this->validate($request, 
            ['email' => 'required|email'],
            // array(
            //     'email.required' => trans('lang.Email_req'), 
            //     'email.email' => trans('lang.Email_valid'), 
            // )
        );
    }
}
