<?php

namespace App\Http\Controllers\Api\Artist\Art;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\PaintingExbition;
use App\Models\PaintingExbitionPainting;
use App\Models\RegisterForSale;
use App\Models\RegisterForSalePainting;
use App\Models\ArtistPainting;
use Validator;


class PaintingExhibitionController extends Controller
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
    public function registerForSale(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "artist_painting_id" => "required",
            "contact_no" => "required|numeric",
            "city" => "required",
            "country_id" => "required|numeric",
            "price" => "required",
            "date" => "required",
		]);
		
    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
    	}

        $artistPainting = RegisterForSale::create([

            'name' => $request->name,
            'contact_no' => $request->contact_no,
            'city' => $request->city,
            'email' => $request->email,
            'price' => $request->price,
            'date' => $request->date,
            'country_id' => $request->country_id,
        ]);

        foreach($request->artist_painting_id as $v) {

            $artist = ArtistPainting::where('id', $v)->first();
            if(empty($artist)) {

                return response()->json([
                    'status'	=> Controller::HTTP_BAD_REQUEST,
                    'message'	=> "Invalid Artist painting ID",
                ]); die;
            }
            RegisterForSalePainting::create([

                'artist_painting_id' => $v,
                'painting_exbition_id' => $artistPainting->id,
                'artist_id' => $artist->artist_id,
            ]);

        }

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Registered Successfully.",
		]);
    }

    public function exbitionRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "artist_painting_id" => "required",
            "contact_no" => "required|numeric",
            "city" => "required",
            "country_id" => "required|numeric",
		]);
		
    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
    	}

        $artistPainting = PaintingExbition::create([

            'name' => $request->name,
            'contact_no' => $request->contact_no,
            'city' => $request->city,
            'email' => $request->email,
            'country_id' => $request->country_id,
        ]);

        foreach($request->artist_painting_id as $v) {

            $artist = ArtistPainting::where('id', $v)->first();
            if(empty($artist)) {

                return response()->json([
                    'status'	=> Controller::HTTP_BAD_REQUEST,
                    'message'	=> "Invalid Artist painting ID",
                ]); die;
            }
            PaintingExbitionPainting::create([

                'artist_painting_id' => $v,
                'painting_exbition_id' => $artistPainting->id,
                'artist_id' => $artist->artist_id,
            ]);

        }

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Registered Successfully.",
		]);
    }

}
