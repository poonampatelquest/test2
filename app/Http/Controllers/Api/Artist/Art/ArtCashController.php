<?php

namespace App\Http\Controllers\Api\Artist\Art;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\TypeOfArtWork;
use App\Models\PaintingTechnique;
use App\Models\PaintingCategory;
use App\Models\PaintingStyle;
use App\Models\ArtistPainting;
use App\Models\FixInformation;
use App\Models\ArtCash;
use App\Http\Requests\Art\Painting;
use Carbon\Carbon;


class ArtCashController extends Controller
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

    public function artCashList(Request $request)
    {

        $fromDate = $request->fromDate ?: "";
        $toDate = $request->toDate ?: "";
        $amount = $request->amount ?: "";
        $type = $request->type ?: "";

        $id = auth('api_artist')->user()->id;

        $data = ArtCash::where('artist_id', $id)->whereNotNull('art_cash_amount');

        if(!empty($fromDate)) {
            $fromDate = Carbon::parse($fromDate)->format('Y-m-d');
            $data->whereDate('created_at', ">=", $fromDate);
        }

        if(!empty($toDate)) {
            $toDate = Carbon::parse($toDate)->format('Y-m-d');
            $data->whereDate('created_at','<=', $toDate);
        }

        if(!empty($type)) 
            $data->where('earn_spend', $type);

        if(!empty($amount)) {
            $data->where('art_cash_amount', '<=', $amount);
        }

        $data = $data->orderBy('created_at', 'DESC')->get();

        if(empty($data)){
            return response()->json([
                'status'	=> Controller::HTTP_BAD_REQUEST,
                'message'	=> "No data found.",
            ]);   
        }

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $data
		]);
    }

}
