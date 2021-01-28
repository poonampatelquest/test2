<?php

namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  	public function getPassword()
  	{
  		return view('admin.profile.change-password');
  	}
	
	public function updateProfile(Request $request){
	  	
	  	$this->validate($request, [
		        'name' => 'required',
		        'email'=> 'required|email',
	           	'profile_picture' => 'nullable|image|mimes:jpg,png,gif,jpeg',

	    	]);

		$result = auth()->user();
		if($request->input('email') != "") {
			if($result->email != $request->input('email')) {

				$email  = User::where('email',$request->input('email'))->where('deleted_at', null)->count();
				
				if($email > 0){

					return redirect()->back()->with('status_err'," This Email address already in use."); 
				}
			}
		}

		$result->email = $request->email;
		$result->full_name = $request->name;

		if(!empty($request->file('profile_picture'))) {
		
			$image = $request->file('profile_picture');
			$imgName = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/uploads/user_images/');
			$image->move($destinationPath, $imgName);
			$result->profile_picture = $imgName;
		}

	    $result->save();

		return redirect()->back()->with('status',"Profile Update Successfully");
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
		
		$user = auth()->user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
 
		return redirect()->back()->with('status', "Your Password Updated Successfully");

	}

}
