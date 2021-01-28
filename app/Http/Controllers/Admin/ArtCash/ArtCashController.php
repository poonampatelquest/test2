<?php

namespace App\Http\Controllers\Admin\ArtCash;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\FixInformation;
use App\Models\ArtCash;
use App\Models\Artist;
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
        $artistName = $request->artistName ?: "";
        $perticulars = $request->perticulars ?: "";

        $data = ArtCash::whereNotNull('art_cash_amount');

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

        if(!empty($artistName)) {
            $data->where('artist_id', $artistName);
        }

        if(!empty($perticulars)) {
            $data->where('art_cast_type', $perticulars);
        }

        $data = $data->orderBy('created_at', 'DESC')->paginate(50); 

        if($request->ajax()) {
            return view('admin.artCash.ajax.art-cash', compact('data'));
        }

        $fixinfo = FixInformation::first();
        $artistName = Artist::get();

        return view('admin.artCash.art-cash', compact('data', 'fixinfo', 'artistName'));
    }

}
