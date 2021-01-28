<?php

namespace App\Http\Controllers\User\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use Auth;
use Illuminate\Support\Facades\Hash;
use Storage;

class AddressController extends Controller
{
  	public function addressList()
  	{
        $id = auth()->user()->id;
		$data = UserAddress::where('user_id', $id)->get();
  		return view('user.address.address-list', compact('data'));
  	}
	
	public function addressAdd(Request $request) {
		
	  	$this->validate($request, [
			'painting_id' => 'required',
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

  	public function addressEdit(Request $request) {

        $this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'id' => 'required',
			'email' => 'required|email',
			'mobile' => 'required|numeric',
			'address_name' => 'required',
			'address' => 'required',
			'city' => 'required',
			'pin_code'=> 'required',
			'state' => 'required',    
		]);

		$request->request->remove('_token');
		$update = UserAddress::where('id', $request->id)->update($request->all());
		if($update)
			return redirect()->route('user.address.list')->with('status',"Address Updated Succesfully");
	
		return back()->with('status_err', "Something went wrong please try again");	
	}

	public function addressDelete($id) {
		$id = decrypt($id);
		$data = UserAddress::find($id);
		if(empty($data))
			return back()->with('status_err', "Something went wrong. Please try again later");
		
		$data->delete();
		return back()->with('status', "Address deleted successfully");
  	}

}
