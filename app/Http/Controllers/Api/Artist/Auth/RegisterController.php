<?php

namespace App\Http\Controllers\Api\Artist\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Artist;
use App\Models\ArtistReferral;
use App\Models\FixInformation;
use App\Models\ArtCash;
use App\Models\ArtistDevice;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Storage;
use Session;
use Auth;
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data   
     * return \App\Models\Artist
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:artists'],
            'password'      => ['required', 'string', 'min:6', 'confirmed'],
            'country_code'  => ['required'],
            'mobile'        => ['required', 'numeric'],
            'referred_by'   => ['nullable', 'exists:artists,referral_code'],
            'insta_id'      => ['nullable', 'url'],
            'fb_id'         => ['nullable', 'url'],
            'fb_id'         => ['nullable', 'url'],
            'signature_image' => [ 'nullable', 'image'],
            'device' => ['required'],
            'device_token' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => reset($errors)[0],
                'results'   => (object) []
            ]);
        }

        // Get refered artist id 
        $referred_artist_id = "";
        $refferalArtist = array();
        if($request->referred_by) {

            $refferalArtist = Artist::where('referral_code', $request->referred_by )->first();
            if(!empty($refferalArtist))
                $referred_artist_id = $refferalArtist->id;
        }

        // generate refferal code
        $referralCode = "TAW".rand(9999, 99999).time();

        // Image upload 
        $signature_image = 'signature_image.png';
        if(isset($request->signature_image) && $request->signature_image) {
            $value = $request->signature_image;
            $signature_image = 'signature_image-'.time().'.'.$value->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('artist/signature', $value, $signature_image);
        }

        $artist = Artist::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
            'country_code'  => $request->country_code, 
            'award_achievement' => $request->award_achievement,
            'other_content'  => $request->other_content,
            'referral_code'  => $referralCode,
            'mobile'        => $request->mobile,
            'insta_id'      => $request->insta_id,
            'fb_id'         => $request->fb_id,
            'password'      => Hash::make($request->password),
            'referred_artist_id'   => $referred_artist_id,
            'signature_image'   => $signature_image,
        ]);

        $info = FixInformation::first();

        if(!empty($refferalArtist)) {
            ArtistReferral::create([
                'artist_id' => $artist->id,
                'reffered_to' => $referred_artist_id,
                'is_join' => '1',
                'refferal_code' => $request->referred_by
            ]);

            // Add  Art cash IN refferal Account
            ArtCash::create([
                'artist_id' => $referred_artist_id,
                'art_cash_amount' => $info->referral_amount,
                'earn_spend' => 'earn',
                'art_cast_type' => 'refferal'
            ]);
        }


        ArtCash::create([
            'artist_id' => $artist->id,
            'art_cash_amount' => $info->registration_amount,
            'earn_spend' => 'earn',
            'art_cast_type' => 'registration'
        ]);

        ArtistDevice::Create([
            'device'        => $request->device,
            'device_token'  => $request->device_token,
            'artist_id'       => $artist->id
        ]);

        $artist->token = $artist->createToken('api_artist')->accessToken; 
        //this function return only specific column values
        $result = $artist->only(['id','name', 'country_code', 'email', 'mobile', 'profile_image', 'fb_id', 'insta_id', 'created_at', 'signature_image', 'profile_image', 'background_image', 'award_achievement', 'other_content', 'referral_code']);
        $result['token'] = $artist->token;
        
        return response()->json([
            'status'    => Controller::HTTP_OK,
            'message'   => 'Successfully loggedin',
            'data'   => $result
        ]);
    }

}
