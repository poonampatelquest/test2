<?php

namespace App\Http\Controllers\Api\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserDevice;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'device' => ['required'],
            'device_token' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => reset($errors)[0]
            ]);
        }

        $artist = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password)
        ]);

        UserDevice::Create([
            'device'        => $request->device,
            'device_token'  => $request->device_token,
            'artist_id'       => $artist->id
        ]);

        $artist->token = $artist->createToken('api_artist')->accessToken; 
        $result = $artist->only(['id','name', 'email', 'profile_image']);
        $result['token'] = $artist->token;
        
        return response()->json([
            'status'    => Controller::HTTP_OK,
            'message'   => 'Successfully loggedin',
            'data'   => $result
        ]);
    }

}
