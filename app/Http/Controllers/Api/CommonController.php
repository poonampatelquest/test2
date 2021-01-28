<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\ArtistPainting;
use App\Models\PaintingCategory;
use App\Models\TypeOfArtWork;
use App\Models\PaintingTechnique;
use App\Models\PaintingStyle;
use App\Models\FixInformation;
use App\Models\ArtistPaintingImage;
use App\Models\Artist;
use App\Models\ContactUs;
use App\Models\FAQ;
use App\Models\ContactInfo;
use DB;


class CommonController extends Controller
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

    public function fixInformations(Request $request)
    {
        $fixinfo = FixInformation::first();
          return response()->json([
        'status'	=> Controller::HTTP_OK,
        'message'	=> "Successfully.",
        'data'		=> $fixinfo
      ]);
    }

    public function country(Request $request)
    {
        $data = DB::table('countries')->get();
          return response()->json([
          'status'	=> Controller::HTTP_OK,
          'message'	=> "Successfully.",
          'data'		=> $data
        ]);
    }


    public function typeOfArtWork(Request $request)
    {
        $data = TypeOfArtWork::get();
        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $data
		]);
    }

    public function getOtherAttributeBasedOnTypeOfArtWork(Request $request)
    {
        $typeOfWorkId = $request->type_of_work_id;

        if(empty($typeOfWorkId)) {
            return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> "type of work id required",
    		]);
        }
        $result['category'] = PaintingCategory::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
        $result['technique'] = PaintingTechnique::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
        $result['style'] = PaintingStyle::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $result
		]);
    }


    public function faq(Request $request)
    {

      $faq = FAQ::all();

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $faq
		]);
    }


    public function contactInfo(Request $request)
    {
      $info = ContactInfo::first();
        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $info
		]);
    }


    public function contactUs(Request $request)
    {

      $validator = Validator::make($request->all(), [ 
        'name'         => 'required',
        'email'         => 'required|email',
        // 'subject'         => 'required',
        // 'phone'         => 'required',
        'message'         => 'required',
      ]);

      if ($validator->fails()) {
          
          $errors = $validator->errors()->toArray();
          return response()->json([
              'status'    => Controller::HTTP_BAD_REQUEST,
              'message'   => reset($errors)[0],
          ]);
      }

      ContactUs::create([
          'name' => $request->name,
          'email' => $request->email,
          'subject' => $request->subject,
          'phone' => $request->phone,
          'message' => $request->message,
      ]);

      return response()->json([
        'status'	=> Controller::HTTP_OK,
        'message'	=> "Your message send successfully. We will contact with you ASAP.",
        // 'data'		=> $info
      ]);
    }

}
