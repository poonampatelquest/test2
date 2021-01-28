<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ArtistRequest;

class UserController extends Controller
{
    public function userList(Request $request)
    {
        $data = User::all();
        return view('admin.user.user-list', compact('data'));
    }
    
    public function addArtistShow() {
		  
      	return view('admin.artist.add-artist');
    }

  	public function addArtist(ArtistRequest $request) {

         // Get refered artist id 
        $referred_artist_id = "";
        if($request->referred_by) {
            $refferalArtist = Artist::where('referral_code', $request->referred_by )->first();
            $referred_artist_id =  $refferalArtist->id;
        }

        // generate refferal code
        $referralCode = "TAW".rand(9999, 99999).time();

        // Image upload 
        $signature_image = 'signature_image.png';
        if($request->signature_image) {
            $file = $request->file('signature_image');
            $signature_image = 'signature_image-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('artist/signature', $signature_image);
        }

        return User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
            'country_code'  => $request->country_code, 
            'award_achievement' => $request->award_achievement,
            'other_content'  => $request->other_content,
            'referral_code'  => $referral_code,
            'mobile'        => $request->mobile,
            'insta_id'      => $request->insta_id,
            'fb_id'         => $request->fb_id,
            'password'      => Hash::make($request->password),
            'referred_artist_id'   => $referred_artist_id,
            'signature_image'   => $signature_image,
        ]);
 
        return redirect()->back()->with('status', "Artist Added successfully Successfully");
    }

  	public function changeStatus(Request $request)
  	{
		$id = $request->id;
		$user = User::where('id',$id)->first();
		if(empty($user)) {
		$final_data = array('success'=>false);
		}
		if($user->is_active == 0){
		
		$user->is_active = 1;

		}else {
		$user->is_active = 0;
		}
		$user->save();

		$final_data = array('success'=>true, 'status'=>$user->is_active);
		return  response()->json($final_data);

  	} 

}
