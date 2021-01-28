<?php

namespace App\Http\Controllers\Artist;

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

        $id = auth('artist')->user()->id;
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


        $data = $data->latest()->paginate(20); 

        if($request->ajax()) {
            return view('artist.ajax.dashboard-painting-list', compact('data'));
        }

        $paintingName = ArtistPainting::orderBy('painting_name')->distinct('painting_name')->pluck('painting_name')->toArray();
        $paintingCategory = PaintingCategory::get();
        $location = ArtistPainting::orderBy('location')->distinct('location')->pluck('location')->toArray();
        $price = ArtistPainting::where('artist_id', $id)->latest()->get();

        return view('artist.dashboard', compact('data', 'totalPaintings', 'paintingCategory', 'onSalePainting', 'approvedPendingPainting', 'price', 'artCashbalance', 'artistRefferalPoints'));
    }

}
