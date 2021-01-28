<?php

namespace App\Http\Controllers\Api\Artist\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use Validator;

class ProfileController extends Controller
{

	public function getProfile(Request $request) {
		
		$result = auth('api_artist')->user();
		$result = $result->only(['id','name', 'country_code', 'email', 'mobile', 'profile_image', 'fb_id', 'insta_id', 'created_at', 'signature_image', 'profile_image', 'background_image', 'award_achievement', 'other_content', 'referral_code']);
       
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
			'insta_id'=> 'nullable|url',
			'fb_id'=> 'nullable|url',
			'country_code'  => 'required',
			'mobile'        => 'required',
			'email'=> 'required|email',
			'profile_picture' => 'nullable|image|mimes:jpg,png,gif,jpeg',
			'signature_image' => 'nullable|image|mimes:jpg,png,gif,jpeg',
		]);
		
    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
    	}

		$result = auth('api_artist')->user();
		if($request->input('email') != "") {
			if($result->email != $request->input('email')) {

				$email  = Artist::where('email',$request->input('email'))->where('deleted_at', null)->count();
				
				if($email > 0) {

					return response()->json([
						'status'	=> Controller::HTTP_BAD_REQUEST,
						'message'	=> "This Email address already in use.",
					]);
				}
			}
		}

		$result->email = $request->email;
		$result->name = $request->name;
		$result->other_content = $request->other_content;
		$result->fb_id = $request->fb_id;
		$result->insta_id = $request->insta_id;
		$result->country_code = $request->country_code;
		$result->mobile = $request->mobile;
		$result->award_achievement = $request->award_achievement;

		if(!empty($request->file('profile_image'))) {
			$image = $request->file('profile_image');
			$imageName = 'profile_avtar-'.time().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('artist/profile', $image, $imageName);
			$result->profile_image = $imageName;
		}

		if(!empty($request->file('signature_image'))) {
			$image = $request->file('signature_image');
			$imageName = 'signature_image-'.time().'.'.$image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('artist/signature', $image, $imageName);
			$result->signature_image = $imageName;
		}

		$result->save();
		$result = $result->only(['id','name', 'country_code', 'email', 'mobile', 'profile_image', 'fb_id', 'insta_id', 'created_at', 'signature_image', 'profile_image', 'background_image', 'award_achievement', 'other_content', 'referral_code']);
       
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

		if (!(Hash::check($request->input('oldPassword'), auth('api_artist')->user()->password)))
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
		
		$user = auth('api_artist')->user();
        $user->password = bcrypt($request->input('password'));
		$user->save();
		
		return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Your Password Updated Successfully",
		]);

	}

}
