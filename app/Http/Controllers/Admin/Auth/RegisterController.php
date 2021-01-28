<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Artist;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'country_code'  => ['required'],
            'mobile'        => ['required', 'numeric'],
            'referred_by'   => ['nullable', 'exists:artists, referral_code'],
            'insta_id'      => ['nullable', 'url'],
            'fb_id'         => ['nullable', 'url'],
            'fb_id'         => ['nullable', 'url'],
            'signature_image' => [ 'nullable', Rule::dimensions()->maxWidth(120)->maxHeight(33)->ratio(33 / 120) ],
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
        if($data['referred_by']) {
            $refferalArtist = Artist::where('referral_code', $data['referred_by'] )->first();
            $referred_artist_id = 
        }

        // generate refferal code
        $referralCode = "TAW".rand(9999, 99999).time();

        // Image upload 
        $signature_image = 'signature_image.png';
        if($data['signature_image']) {
            $file = $request->file('signature_image');
            $signature_image = 'signature_image-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('artist/signature', $signature_image);
        }

        return Artist::create([
            'name'          => $data['name'],
            'email'         => $data['email'],
            'password'      => $data['password'],
            'country_code'  => $data['country_code'], 
            'award_achievement' => $data['award_achievement'],
            'other_content'  => $data['other_content'],
            'referral_code'  => $referral_code,
            'mobile'        => $data['mobile'],
            'insta_id'      => $data['insta_id'],
            'fb_id'         => $data['fb_id'],
            'password'      => Hash::make($data['password']),
            'referred_artist_id'   => $referred_artist_id,
            'signature_image'   => $signature_image,
        ]);
    }
}
