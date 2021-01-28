<?php

namespace App\Http\Controllers\Api\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\ArtistPainting;
use App\Models\PaintingCategory;
use App\Models\Artist;


class DashboardController extends Controller
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

    public function index(Request $request)
    {

        $search = $request->search  ?: "";
        $serchPaintingCategory = $request->paintingCategory ?: "";
        $price = $request->price ?: "";

        $id = auth('api_artist')->user()->id;
        $artist = Artist::findOrFail($id);

        $totalPaintings = $artist->artistAllPaintings();
        $onSalePainting = $artist->artistForSalePaintings();
        $approvedPendingPainting = $artist->artistApprovedPendingPaintings();
        $artistRefferalPoints = $artist->artistRefferalPoints();
        $artCashbalance = $artist->artCashbalance();

        $data = ArtistPainting::where('artist_id', $id);
        if(!empty($search)) {
            $data->where(function($query) use($search) {
                $data->where('painting_name', "LIKE", "%$searchPaintingName%");
            });
        }

        if(!empty($serchPaintingCategory)) 
            $data->where('painting_category_id', $serchPaintingCategory);


        $data = $data->latest()->first(); 

        if($request->ajax()) {
            return view('artist.ajax.dashboard-painting-list', compact('data'));
        }

        $result['totalPaintings'] = $totalPaintings;
        $result['onSalePainting'] = $onSalePainting;
        $result['approvedPendingPainting'] = $approvedPendingPainting;
        $result['artistRefferalPoints'] = $artistRefferalPoints;
        $result['artCashbalance'] = $artCashbalance;
        $result['data'] = $data;


        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $result
        ]);
        
    }


}
