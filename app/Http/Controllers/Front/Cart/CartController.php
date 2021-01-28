<?php

namespace App\Http\Controllers\Front\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ArtistPainting;
use App\Models\TypeOfArtWork;
use App\Models\PaintingTechnique;
use App\Models\PaintingCategory;
use App\Models\PaintingStyle;
use App\Models\FixInformation;
use App\Models\ArtistPaintingCommisionMessage;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ArtistRequest;

class CartController extends Controller
{
  	public function cart(Request $request)
  	{
        $data = session('cart') ? array() : array();

        if(auth()->check()) {
            $id = auth()->user()->id;
            $data = Cart::where('user_id', $id)->get();
        }
       
  		return view('front.cart.cart', compact('data'));
    }

    public function addToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'product_id'   => ['nullable', 'exists:products,id'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return response()->json([
                'status'    => Controller::HTTP_BAD_REQUEST,
                'message'   => reset($errors)[0],
                'results'   => (object) []
            ]);
        }

        if(auth()->check()) {
            $data = Cart::where('user_id', auth()->user()->id)->get();
        }


        $guestUserSession = session('guestUserSession');

        if(empty($guestUserSession)) {
            $session = microtime().rand(9999, 999990);
            session(['guestUserSession' => $session]);
        }
        else {

            $data = CartTemp::where('session_id', $guestUserSession)->get();
        }

        return response()->json([
            'status'    => Controller::HTTP_OK,
            'message'   => "success",
            'data'   => $data
        ]);


    }

    public function getOtherAttributeBasedOnTypeOfArtWork(Request $request)
    {
        $typeOfWorkId = $request->type_of_work_id;
        if(empty($typeOfWorkId)) {

            $category = PaintingCategory::where('is_active', 1)->get();
            $technique = PaintingTechnique::where('is_active', 1)->get();
            $style = PaintingStyle::where('is_active', 1)->get();
        }
        else {
            $category = PaintingCategory::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
            $technique = PaintingTechnique::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
            $style = PaintingStyle::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
        }
        return array('category' => $category, 'technique' => $technique, 'style' => $style);
    }

    public function artistDetail(Request $request, $name, $id)
    {
        $id = decrypt($id);
        $data = Artist::findOrFail($id);
        return view('front.artist.artist-detail', compact('data'));
    }

    public function artistPaintingDetail(Request $request, $artistName, $paintingName, $id)
    {
        $id = decrypt($id);
        $data = ArtistPainting::findOrFail($id);
        $info = FixInformation::findOrFail(1);
        return view('front.artist.painting-detail', compact('data', 'info'));
    }

    public function sendPaintingCommisionMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'paintingId'    => 'required|exists:artist_paintings,id', 
            'message'       => 'required',
            'email'         => 'required|email'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            return array(
                'message'   => reset($errors)[0],
                'status'   => 0
            );
        }

        $id = $request->paintingId;
        $message = $request->message;
        $email = $request->email;
        $data = ArtistPainting::find($id);
        ArtistPaintingCommisionMessage::create([
            'artist_id' => $data->artist->id,
            'artist_painting_id' => $data->id,
            'message' => $message,
            'email' => $email,
        ]);

        return array(
            'message'   => "Your painting commision message send succussfully.",
            'status'   => 1
        );
    }

    
}
