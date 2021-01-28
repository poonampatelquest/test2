<?php

namespace App\Http\Controllers\Api\User\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use Validator;

class AddressController extends Controller
{
  	public function addressList()
  	{
        $id = auth('api')->user()->id;
		$data = UserAddress::where('user_id', $id)->get();

		if(count($data)) {
			return response()->json([
				'status'	=> Controller::HTTP_OK,
				'message'	=> "Successfully.",
				'data'		=> $data
			]);
		}

		return response()->json([
			'status'	=> Controller::HTTP_BAD_REQUEST,
			'message'	=> "No Data found.",
		]);
	}

	
	
	public function addressAdd(Request $request) {
	  	
		$validator = Validator::make($request->all(), [
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

		if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
		}
		
		$request->request->add(['user_id' => auth('api')->user()->id]);
		UserAddress::create($request->all());

		return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Address Added Successfully."
		]);

	}

	public function getAddress(Request $request) {
		$validator = Validator::make($request->all(), [
            "id" => "required",
		]);

		if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
		}
		
        $id = $request->id;
        $data = UserAddress::find($id);
		
		if(empty($data)) {
            return response()->json([
                'status'	=> Controller::HTTP_BAD_REQUEST,
                'message'	=> "Address id is invalid.",
            ]);
        }

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'	=> $data,
		]);
  	}

  	public function addressEdit(Request $request) {

        $validator = Validator::make($request->all(), [
			'id' => 'required',
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

		if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
		}

		$update = UserAddress::where('id', $request->id)->update($request->all());
		if($update) {
			return response()->json([
				'status'	=> Controller::HTTP_OK,
				'message'	=> "Address Updated Succesfully",
			]);
		}

		return response()->json([
			'status'	=> Controller::HTTP_BAD_REQUEST,
			'message'	=> "Something went wrong please try again",
		]);
	}

	public function addressDelete(Request $request) {

		$validator = Validator::make($request->all(), [
            "id" => "required",
		]);

		if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
		}
		
        $id = $request->id;
        $data = UserAddress::find($id);
        if(empty($data)) {
            return response()->json([
                'status'	=> Controller::HTTP_BAD_REQUEST,
                'message'	=> "Address id is invalid.",
            ]);
        }

        $data->delete();

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Address Deleted Successfully.",
		]);
  	}

}
