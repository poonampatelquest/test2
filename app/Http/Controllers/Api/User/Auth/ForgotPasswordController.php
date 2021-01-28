<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\Artist\ForgotPasswordMail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Hash;
use Validator;

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

    public function forgotPassword(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
    	]);
    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
    	}

        $user = User::where(['email' => $request->email])->first();

        if(empty($user)) {

            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => 'Invalid user email',
            ]);
        }

        if( $user->is_active == 0 ) {

            return response()->json([
                'status' => Controller::HTTP_BAD_REQUEST,
                'message' => 'Your account inactive by admin',
            ]);
        }

        $password = rand(9999999, 99999999);
        $data = array('Name' => $user->name, "password" => $password);

        try {

            Mail::to($request->email)->send(new ForgotPasswordMail($data));  
            
            if (Mail::failures()) {
                
                return response()->json([
	    			'status'	=> Controller::HTTP_BAD_REQUEST,
	    			'message'	=> 'Something went wrong. Please try again later.',
	    		]);
            }

            $user->password = Hash::make($password);
            $user->save();
            return response()->json([
                'status'	=> Controller::HTTP_OK,
                'message'	=> 'New Password is send to you in your mail. Please check.',
            ]);

        }
        catch(Execption $e) {

            return response()->json([
                'status'	=> Controller::HTTP_BAD_REQUEST,
                'message'	=> 'Something went wrong. Please try again later.',
            ]);
        }  
    }

}
