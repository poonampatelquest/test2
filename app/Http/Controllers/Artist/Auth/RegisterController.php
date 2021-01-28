<?php

namespace App\Http\Controllers\Artist\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Artist;
use App\Models\ArtistReferral;
use App\Models\FixInformation;
use App\Models\ArtCash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Storage;
use Session;
use Auth;

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

    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view('artist.auth.register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ARTIST;

    // public function redirectTo() {
    //     auth('artist')->logout();
    //     Session::flash('status_err', 'Before proceeding, please check your email for a verification link.'); 
    //     return route('artist.login');
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:artist')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('artist');   
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
             // 'signature_image' => [ 'nullable', Rule::dimensions()->maxWidth(120)->maxHeight(33)->ratio(33 / 120) ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Get refered artist id 
        $referred_artist_id = "";
        $refferalArtist = array();
        if($data['referred_by']) {

            $refferalArtist = Artist::where('referral_code', $data['referred_by'] )->first();
            if(!empty($refferalArtist))
                $referred_artist_id = $refferalArtist->id;
        }

        // generate refferal code
        $referralCode = "TAW".rand(9999, 99999).time();

        // Image upload 
        $signature_image = 'signature_image.png';
        if(isset($data['signature_image']) && $data['signature_image']) {
            $value = $data['signature_image'];
            $signature_image = 'signature_image-'.time().'.'.$value->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('artist/signature', $value, $signature_image);
        }

        $artist = Artist::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => $data['password'],
            'country_code'  => $data['country_code'], 
            'award_achievement' => $data['award_achievement'],
            'other_content'  => $data['other_content'],
            'referral_code'  => $referralCode,
            'mobile'        => $data['mobile'],
            'insta_id'      => $data['insta_id'],
            'fb_id'         => $data['fb_id'],
            'password'      => Hash::make($data['password']),
            'referred_artist_id'   => $referred_artist_id,
            'signature_image'   => $signature_image,
        ]);

        $info = FixInformation::first();

        if(!empty($refferalArtist)) {
            ArtistReferral::create([
                'artist_id' => $artist->id,
                'reffered_to' => $referred_artist_id,
                'is_join' => '1',
                'refferal_code' => $data['referred_by']
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

        return $artist;
    }
}
