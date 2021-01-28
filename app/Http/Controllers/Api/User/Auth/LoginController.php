<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDevice;
use Auth;
use Validator;
use Hash;


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
    public function login(Request $request)
    {
        // 'email' => 'required|email:rfc,dns|max:255',
        $validator = Validator::make($request->all(), [ 
            'email'         => 'required|email:rfc,dns', 
            'password'      => 'required', 
            'device_token' 	=> 'required',
            'device'        => 'required',
        ]);

        if ($validator->fails()) {
            
            $errors = $validator->errors()->toArray();
            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => reset($errors)[0],
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if( ! $user ) {
            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => 'You are not a registered.', 
            ]);
        }

        if( ! Hash::check($request->password, $user->password) ) {
            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => 'Invalid Email-id and password', 
            ]);
        } 

        if( $user->is_active == 0 ) {

            return response()->json([
                'status' => Controller::HTTP_BAD_REQUEST,
                'message' => 'Your account inactive by admin. Please contact admin for more information',
            ]);
        }

        UserDevice::updateOrCreate([
            'user_id'       => $user->id
        ],[
            'device'        => $request->device,
            'device_token'  => $request->device_token
        ]);

        $user->token = $user->createToken('api')->accessToken; 

        //this function return only specific column values
        $result = $user->only(['id','name', 'email', 'profile_image']);
        $result['token'] = $user->token;
        
        return response()->json([
            'status'    => Controller::HTTP_OK,
            'message'   => 'Successfully loggedin',
            'data'   => $result
        ]);
        
    }

    public function logout(Request $request)
    {
        // Make validations
        $validator = Validator::make($request->all(), [
            'device' => ['required'],
            'device_token' => ['required']
        ]);

        // If validation fails
        if( $validator->fails() )
        {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => reset($errors)[0],
                // 'object' => (object) []
            ]);
        }

        // authenticated user
        $user = auth()->user('api');

        // Delete device token
        $user->devices()->where([
            'device' => $request->device_id,
            'device_token' => $request->device_token
        ])->delete();

        // Delete token
        $request->user()->token()->revoke();

        return response()->json([
            'status' => Controller::HTTP_OK,
            'message' => "logout successfully",
        ]);
    }

    
}
