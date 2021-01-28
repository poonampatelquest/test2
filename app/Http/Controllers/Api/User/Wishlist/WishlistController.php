<?php

namespace App\Http\Controllers\Api\User\Wishlist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserWishlist;
use App\Models\ArtistPainting;
use Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class WishlistController extends Controller
{
  	public function wishlist()
  	{
        $id = auth()->user()->id;
		$data = UserWishlist::where('user_id', $id)->paginate(30);
  		return view('user.wishlist.wishlist', compact('data'));
  	}
	
	public function addressAdd(Request $request) {
	  	
	  	$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'mobile' => 'required|numeric',
			'address_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'pin_code'=> 'required',
			'state' => 'required',    
		]);

		$request->request->add(['user_id' => auth()->user()->id]);
		UserAddress::create($request->all());
		return redirect()->route('user.address.list')->with('status',"Address Added Succesfully");
	}

	public function addressAddShow() {
  		return view('user.address.address-add');
	}

	public function addressEditShow($id) {
		$id = decrypt($id);
		$data = UserAddress::find($id);
		return view('user.address.address-edit', compact('data'));
  	}

  	public function addInWishlist(Request $request) {

		$id = $request->id;
		$userId = auth()->user()->id;
        $data = ArtistPainting::find($id);
        if(empty($data))
			return array( "success" => false, "message" => "Something went wrong. Refresh the page and try again.");
		
		//check already added
		$check = UserWishlist::where('user_id', $userId)->where('artist_painting_id', $id)->first();
		if(empty($check)) {
			UserWishlist::create([
				"user_id" => $userId,
				"artist_painting_id" => $data->id,
				"artist_id" => $data->artist_id
			]);
			return array( "success" => true, "status" => 1, "message" => "Added in your wishlist");
		}
		$check->delete();
		return array( "success" => true, "status" => 0, "message" => "Remove From wishlist");
	}

	public function removeFromWishlist($id) {
		$id = decrypt($id);
		$data = UserWishlist::find($id);
		if(empty($data))
            return back()->with('status_err', "Something went wrong. Please try again later");
            
		$data->delete();
		return back()->with('status', "Remove from your wishlist successfully");
  	}

}
