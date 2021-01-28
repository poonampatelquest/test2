<?php

namespace App\Http\Controllers\Api\User\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use Validator;

class ProfileController extends Controller
{
	public function getProfile(Request $request) {
		
		$result = auth('api')->user();
		$result = $result->only(['id','name', 'email', 'profile_image']);
       
		return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $result
		]);

	}

	public function updateProfile(Request $request) {
		
		$validator = Validator::make($request->all(), [
			'name' => 'required',
		    'email'=> 'required|email',
	        'profile_image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
		]);
		
    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
    	}

		$result = auth('api')->user();
		if($request->input('email') != "") {
			if($result->email != $request->input('email')) {

				$email  = User::where('email',$request->input('email'))->where('deleted_at', null)->count();
				
				if($email > 0){

					return redirect()->back()->with('status_err'," This Email address already in use."); 
				}
			}
		}

		$result->email = $request->email;
		$result->name = $request->name;

		if(!empty($request->file('profile_image'))) {
			$image = $request->file('profile_image');
			$imageName = 'profile_avtar-'.time().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('user/profile', $image, $imageName);
			$result->profile_image = $imageName;
		}

		$result->save();
		$result = $result->only(['id','name', 'profile_image', 'email']);
       
		return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Profile Update Successfully.",
			'data'		=> $result
		]);

	}

	public function updatePassword(Request $request) {

        $validator = Validator::make($request->all(), [
	        'oldPassword' => 'required',
	        'password' => 'required|min:6',
	        'confirm_password'=> 'required|min:6|same:password'
		]);

    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
		}

		if (!(Hash::check($request->input('oldPassword'), auth('api')->user()->password)))
        {
			return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> "You Enter wrong old password"
    		]);
        }

        if(strcmp($request->input('oldPassword'), $request->input('password')) == 0)
        {
			//Current password and new password are same
			return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> "New Password Can't be same as old",
			]);
        }
		
		$user = auth('api')->user();
        $user->password = bcrypt($request->input('password'));
		$user->save();
		
		return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Your Password Updated Successfully",
		]);

	}

}
