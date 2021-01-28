<?php

namespace App\Http\Controllers\Front\Artist;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Artist;
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

class ArtistController extends Controller
{
  	public function artistList(Request $request)
  	{
        $searchByName = $request->searchByName ?: "";
        $data = Artist::where('is_active', 1);

        if(!empty($searchByName)) 
            $data->where('name', "LIKE", "%$searchByName%");

        $data = $data->latest()->paginate(20);
  		return view('front.artist.artist-list', compact('data'));
    }

    public function artistPaintingList(Request $request)
    {
        $typefilter = empty($request->typefilter) ? "" : $request->typefilter;
        $perpagesort = empty($request->perpagesort) ? 15 : $request->perpagesort;
        $sort = empty($request->sort) ? "" : $request->sort;
        $style_id = empty($request->style_id) ? "" : $request->style_id;
        $technique_id = empty($request->technique_id) ? "" : $request->technique_id;
        $category_id = empty($request->category_id) ? "" : $request->category_id;
        $size = empty($request->size) ? "" : $request->size;
        $orientation = empty($request->orientation) ? "" : $request->orientation;
        $amount = empty($request->amount) ? "" : $request->amount;
        $height = empty($request->height) ? "" : $request->height;
        $width = empty($request->width) ? "" : $request->width;

        $data = Artist::where('is_active', 1);
        $data->whereHas('artistPaintings', function($q) use($typefilter, $style_id, $technique_id, $category_id, $size, $orientation, $amount, $height, $width, $sort) {
            
            $q->where('is_approved', 1);

            if(!empty($typefilter))
                $q->where('type_of_art_work_id', $typefilter);

            if(!empty($style_id))
                $q->where('painting_style_id', $style_id);

            if(!empty($technique_id))
                $q->where('painting_technique_id', $technique_id);

            if(!empty($category_id))
                $q->where('type_of_art_work_id', $category_id);
            
            if(!empty($amount)) {
                $amountArr = explode(' - ', $amount);
                $startAmount = isset($amountArr[0]) ? $amountArr[0] : 0;
                $endAmount = isset($amountArr[1]) ? $amountArr[1] : 50000;
                $q->whereBetween('basic_price', [$startAmount, $endAmount]);
            }

            if(!empty($height)) {
                $heightArr = explode(' - ', $height);
                $startheight = isset($heightArr[0]) ? $heightArr[0] : 0;
                $endheight = isset($heightArr[1]) ? $heightArr[1] : 50000;
                $q->whereBetween('painting_height', [$startheight, $endheight]);
            }

            if(!empty($width)) {
                $widthArr = explode(' - ', $width);
                $startwidth = isset($widthArr[0]) ? $widthArr[0] : 0;
                $endwidth = isset($widthArr[1]) ? $widthArr[1] : 50000;
                $q->whereBetween('painting_width', [$startwidth, $endwidth]);
            }

            if(!empty($orientation))
                $q->where('orientation', $orientation);

            if(!empty($sort)) {
                $q->orderBy('created_at');
            }
        });
        $data->with(['artistPaintings' => function($q) use($typefilter, $style_id, $technique_id, $category_id, $size, $orientation, $amount, $height, $width, $sort) {
            
            $q->where('is_approved', 1);

            if(!empty($typefilter))
                $q->where('type_of_art_work_id', $typefilter);

            if(!empty($style_id))
                $q->where('painting_style_id', $style_id);

            if(!empty($technique_id))
                $q->where('painting_technique_id', $technique_id);

            if(!empty($category_id))
                $q->where('type_of_art_work_id', $category_id);
            
            if(!empty($amount)) {
                $amountArr = explode(' - ', $amount);
                $startAmount = isset($amountArr[0]) ? $amountArr[0] : 0;
                $endAmount = isset($amountArr[1]) ? $amountArr[1] : 50000;
                $q->whereBetween('basic_price', [$startAmount, $endAmount]);
            }

            if(!empty($height)) {
                $heightArr = explode(' - ', $height);
                $startheight = isset($heightArr[0]) ? $heightArr[0] : 0;
                $endheight = isset($heightArr[1]) ? $heightArr[1] : 50000;
                $q->whereBetween('painting_height', [$startheight, $endheight]);
            }

            if(!empty($width)) {
                $widthArr = explode(' - ', $width);
                $startwidth = isset($widthArr[0]) ? $widthArr[0] : 0;
                $endwidth = isset($widthArr[1]) ? $widthArr[1] : 50000;
                $q->whereBetween('painting_width', [$startwidth, $endwidth]);
            }

            if(!empty($orientation))
                $q->where('orientation', $orientation);
            
            if(!empty($sort)) {
                $q->orderBy('created_at');
            }
        }]);

        if(empty($sort))
        {
            $data->latest();
        }
        $data = $data->has('artistPaintings')->paginate($perpagesort);
        if($request->ajax()) {
            return view('front.artist.ajax.artists', compact('data'));
        }

        $category = PaintingCategory::get();
        $typeOfWork = TypeOfArtWork::where('is_active', 1)->get();
        $technique = PaintingTechnique::where('is_active', 1)->get();
        $style = PaintingStyle::where('is_active', 1)->get();
        return view('front.artist.artists', compact('data', 'style', 'technique', 'typeOfWork', 'category'));
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
