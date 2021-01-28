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
use App\Models\ArtistPaintingImage;
use App\Http\Requests\Art\Painting;
use Storage;
use Validator;


class PaintingController extends Controller
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

    public function paintingList(Request $request)
    {

        $searchPaintingName = $request->paintingName ?: "";
        $serchPaintingCategory = $request->paintingCategory ?: "";
        $searchPaintinglocation = $request->paintinglocation ?: "";
        $searchSize = $request->size ?: "";

        $id = auth('api_artist')->user()->id;

        $data = ArtistPainting::where('artist_id', $id);

        if(!empty($searchPaintingName)) 
            $data->where('painting_name', "LIKE", "%$searchPaintingName%");

        if(!empty($searchPaintinglocation)) 
            $data->where('location', "LIKE", "%$searchPaintinglocation%");

        if(!empty($serchPaintingCategory)) 
            $data->where('painting_category_id', $serchPaintingCategory);

        if(!empty($searchSize)) 
            $data->whereSize($searchSize);

        $data = $data->latest()
        // ->with(['artistPaintingImages' => function($q){
        //     return $q->first();
        // }])
        ->with('artistPaintingImages')
        ->select('id', 'painting_name', 'basic_price')->paginate(20);

        // $paintingName = ArtistPainting::orderBy('painting_name')->distinct('painting_name')->pluck('painting_name')->toArray();
        // $paintingCategory = PaintingCategory::get();
        // $location = ArtistPainting::orderBy('location')->distinct('location')->pluck('location')->toArray();
        // $allSize = ArtistPainting::where('artist_id', $id)->latest()->get();
        // $size = array();
        // foreach ($allSize as $key => $value) {
        //     array_push($size, $value->height_width);
        // }
        // $size = array_unique($size);

        $result['data'] = $data;
        // $result['paintingName'] = $paintingName;
        // $result['paintingCategory'] = $paintingCategory;
        // $result['location'] = $location;
        // $result['size'] = $size;

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $result
		]);
    }

    public function paintingStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "painting_name" => "required",
            "year_of_production" => "required",
            "orientation" => "required",
            "painting_height" => "required|numeric",
            "height_unit" => "required",
            "painting_width" => "required|numeric",
            "width_unit" => "required|same:height_unit",
            "location" => "required", 
            "type_of_art_work_id" => "required|numeric",
            "painting_category_id" => "required|numeric",
            "painting_style_id" => "required|numeric",
            "painting_technique_id" => "required|numeric",
            "for_sale" => "required",
            "basic_price" => "required_if:for_sale,==,1",
            "commision_price" => "required_if:for_sale,==,1",
            "artist_recieve_price" => "required_if:for_sale,==,1",
            "for_commissioned_work" => "required_if:for_sale,==,0",
            // "images.*" => "required|image|dimensions:width=520,height=478",
            "images.*" => "required_without:id|image",
		]);
		
    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
    	}

        $basic_price = $request->basic_price;
        $commision_price = 0.00;
        $artist_recieve_price = 0.00;
        $commision_precentage = 0.00;
        
        if($request->for_sale == 1) {
            $fixInfo = FixInformation::first();
            $commision_precentage = $fixInfo->painting_commision;
            $commision_price = $basic_price / 100 * $commision_precentage;
            $artist_recieve_price = $basic_price - $commision_price;
        }

        $artistPainting = ArtistPainting::create([

            'artist_id' => auth('api_artist')->user()->id,
            'painting_name' => $request->painting_name,
            'year_of_production' => $request->year_of_production,
            'orientation' => $request->orientation,
            'painting_height' => $request->painting_height,
            'height_unit' => $request->height_unit,
            'painting_width' => $request->painting_width,
            'width_unit' => $request->width_unit,
            'location' => $request->location,
            'type_of_art_work_id' => $request->type_of_art_work_id,
            'painting_category_id' => $request->painting_category_id,
            'painting_style_id' => $request->painting_style_id,
            'painting_technique_id' => $request->painting_technique_id,
            'for_sale' => $request->for_sale,
            'for_commissioned_work' => $request->for_sale ? 0 : $request->for_commissioned_work,
            'basic_price' => $basic_price,
            'commision_precentage' => $commision_precentage,
            'commision_price' => $commision_price,
            'artist_recieve_price' => $artist_recieve_price,
            "painting_description" => $request->painting_description,
        ]);

        // Upload images 
        $images = $request->images;
        if(!empty($images)) {
            foreach ($images as $key => $value) {

                $imageName = 'painting_image-'.time().'.'.$value->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('artist/painting', $value, $imageName);
                // $value->storeAs('artist/painting', $imageName);
                ArtistPaintingImage::create([
                    'artist_painting_id' => $artistPainting->id,
                    'name' => $imageName
                ]);
            }
        }

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Painting Added Successfully.",
		]);
    }

    public function paintingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required",
            "painting_name" => "required",
            "year_of_production" => "required",
            "orientation" => "required",
            "painting_height" => "required|numeric",
            "height_unit" => "required",
            "painting_width" => "required|numeric",
            "width_unit" => "required|same:height_unit",
            "location" => "required", 
            "type_of_art_work_id" => "required|numeric",
            "painting_category_id" => "required|numeric",
            "painting_style_id" => "required|numeric",
            "painting_technique_id" => "required|numeric",
            "for_sale" => "required",
            "basic_price" => "required_if:for_sale,==,1",
            "commision_price" => "required_if:for_sale,==,1",
            "artist_recieve_price" => "required_if:for_sale,==,1",
            "id" => "nullable",
            // "images.*" => "required|image|dimensions:width=520,height=478",
            "images.*" => "required_without:id|image",
		]);
		
    	if( $validator->fails() ) {
    		$errors = $validator->errors()->toArray();
    		return response()->json([
    			'status'	=> Controller::HTTP_BAD_REQUEST,
    			'message'	=> reset($errors)[0],
    		]);
        }
        
        $id = ($request->id);
        // return $request->all();
        $data = ArtistPainting::find($id);

        if(empty($data)) {
            return response()->json([
                'status'	=> Controller::HTTP_BAD_REQUEST,
                'message'	=> "Painting id is invalid.",
            ]);
        }

        $basic_price = $request->basic_price;
        $commision_price = 0.00;
        $artist_recieve_price = 0.00;
        $commision_precentage = 0.00;
        
        if($request->for_sale == 1) {
            $fixInfo = FixInformation::first();
            $commision_precentage = $fixInfo->painting_commision;
            $commision_price = $basic_price / 100 * $commision_precentage;
            $artist_recieve_price = $basic_price - $commision_price;
        }

        ArtistPainting::where('id', $id)->update([

            'painting_name' => $request->painting_name,
            'year_of_production' => $request->year_of_production,
            'orientation' => $request->orientation,
            'painting_height' => $request->painting_height,
            'height_unit' => $request->height_unit,
            'painting_width' => $request->painting_width,
            'width_unit' => $request->width_unit,
            'location' => $request->location,
            'type_of_art_work_id' => $request->type_of_art_work_id,
            'painting_category_id' => $request->painting_category_id,
            'painting_style_id' => $request->painting_style_id,
            'painting_technique_id' => $request->painting_technique_id,
            'for_sale' => $request->for_sale,
            'basic_price' => $basic_price,
            'commision_precentage' => $commision_precentage,
            'commision_price' => $commision_price,
            'artist_recieve_price' => $artist_recieve_price,
            'for_commissioned_work' => $request->for_sale ? 0 : $request->for_commissioned_work,
            "painting_description" => $request->painting_description,
        ]);

        // delete images that is removed;
        $imagesIds = empty($request->imagesIds) ? array() : $request->imagesIds;
        $imagesIds = array_filter($imagesIds);
        $imagesIdArr = $data->artistPaintingImages()->pluck('id')->toArray();

        $imagesTodelete = array_diff($imagesIdArr, $imagesIds);

        foreach ($imagesTodelete as $key => $value) {
            $image = ArtistPaintingImage::find($value);
            if($image) {
                $filename = $image->getOriginal('name');
                Storage::disk('public')->delete($filename);
            }
            $image->delete();
        }
        // upload images
        $images = $request->images;
        if(!empty($images)) {
            foreach ($images as $key => $value) {

                $imageName = 'painting_image-'.time().'.'.$value->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('artist/painting', $value, $imageName);
                // $value->storeAs('artist/painting', $imageName);
                ArtistPaintingImage::create([
                    'artist_painting_id' => $data->id,
                    'name' => $imageName
                ]);
            }
        }

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Painting Updated Successfully.",
		]);
    }

    public function paintingDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required",
		]);
		
        $id = $request->id;
        $data = ArtistPainting::find($id);
        if(empty($data)) {
            return response()->json([
                'status'	=> Controller::HTTP_BAD_REQUEST,
                'message'	=> "Painting id is invalid.",
            ]);
        }
        $data['artist_painting_images'] = $data->artistPaintingImages;

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Successfully.",
			'data'		=> $data
		]);

    }

    public function paintingDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required",
		]);
		
        $id = $request->id;
        $data = ArtistPainting::find($id);
        if(empty($data)) {
            return response()->json([
                'status'	=> Controller::HTTP_BAD_REQUEST,
                'message'	=> "Painting id is invalid.",
            ]);
        }

        $data->delete();

        return response()->json([
			'status'	=> Controller::HTTP_OK,
			'message'	=> "Painting Deleted Successfully.",
		]);

    }

}
