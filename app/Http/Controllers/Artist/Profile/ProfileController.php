<?php

namespace App\Http\Controllers\Artist\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artist;
use Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class ProfileController extends Controller
{
  	public function getPassword()
  	{
  		return view('artist.profile.change-password');
  	}
	
	public function updateProfile(Request $request) {
	  	
	  	$this->validate($request, [
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

		$result = auth('artist')->user();
		if($request->input('email') != "") {
			if($result->email != $request->input('email')) {

				$email  = Artist::where('email',$request->input('email'))->where('deleted_at', null)->count();
				
				if($email > 0){

					return redirect()->back()->with('status_err'," This Email address already in use."); 
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

		return redirect()->back()->with('status',"Profile Update Successfully");
	}

	public function updateProfileShow() {
		$id = auth('artist')->user()->id;
		$data = Artist::findOrFail($id);
  		return view('artist.profile.update-profile', compact('data'));
	}


  	public function updatePassword(Request $request) {

        $this->validate($request, [
	        'oldPassword' => 'required',
	        'password' => 'required|min:6',
	        'confirm_password'=> 'required|min:6|same:password'
    	]);

		if (!(Hash::check($request->input('oldPassword'), auth()->user()->password)))
        {

           	return redirect()->back()->with('status_err',"You Enter wrong old password");
        }


        if(strcmp($request->input('oldPassword'), $request->input('password')) == 0)
        {
            //Current password and new password are same
            return redirect()->back()
                             ->with("status_err","New Password Can't be same as old");
        }
		
		$user = auth('artist')->user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
 
		return redirect()->back()->with('status', "Your Password Updated Successfully");

	}

}
