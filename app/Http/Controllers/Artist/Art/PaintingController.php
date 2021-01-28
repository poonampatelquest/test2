<?php

namespace App\Http\Controllers\Artist\Art;

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

        $id = auth('artist')->user()->id;

        $data = ArtistPainting::where('artist_id', $id);

        if(!empty($searchPaintingName)) 
            $data->where('painting_name', "LIKE", "%$searchPaintingName%");

        if(!empty($searchPaintinglocation)) 
            $data->where('location', "LIKE", "%$searchPaintinglocation%");

        if(!empty($serchPaintingCategory)) 
            $data->where('painting_category_id', $serchPaintingCategory);

        if(!empty($searchSize)) 
            $data->whereSize($searchSize);

        $data = $data->latest()->paginate(20); 

        if($request->ajax()) {
            return view('artist.art.ajax.painting-list', compact('data'));
        }

        $paintingName = ArtistPainting::orderBy('painting_name')->distinct('painting_name')->pluck('painting_name')->toArray();
        $paintingCategory = PaintingCategory::get();
        $location = ArtistPainting::orderBy('location')->distinct('location')->pluck('location')->toArray();
        $allSize = ArtistPainting::where('artist_id', $id)->latest()->get();
        $size = array();
        foreach ($allSize as $key => $value) {
            array_push($size, $value->height_width);
        }
        $size = array_unique($size);

        return view('artist.art.painting-list', compact('data', 'paintingName', 'paintingCategory', 'location', 'size'));
    }

    public function paintingAddShow(Request $request)
    {
        $typeOfWork = TypeOfArtWork::where('is_active', 1)->get();
        $fixInfo = FixInformation::first();
        return view('artist.art.painting-add', compact('typeOfWork', 'fixInfo'));
    }

    public function getOtherAttributeBasedOnTypeOfArtWork(Request $request)
    {
        $typeOfWorkId = $request->type_of_work_id;
        $category = PaintingCategory::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
        $technique = PaintingTechnique::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
        $style = PaintingStyle::where('is_active', 1)->where('type_of_art_work_id', $typeOfWorkId)->get();
        return array('category' => $category, 'technique' => $technique, 'style' => $style);
    }

    public function paintingImages(Request $request)
    {
        $id = $request->id;
        return view('artist.art.ajax.painting-image', compact('id'));
    }

    public function paintingStore(Painting $request)
    {

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

            'artist_id' => auth('artist')->user()->id,
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
            'for_commissioned_work' => $request->for_sale ? '' : $request->for_commissioned_work,
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

        return redirect()->route('artist.painting.list')->with("status", "Painting Added Successfully");
    }

    public function paintingEdit($id)
    {
        $id = decrypt($id);
        $data = ArtistPainting::findOrFail($id);
        // return $data->artistPaintingImages;
        $typeOfWork = TypeOfArtWork::where('is_active', 1)->get();
        $category = PaintingCategory::where('is_active', 1)->where('type_of_art_work_id', $data->type_of_art_work_id)->get();
        $technique = PaintingTechnique::where('is_active', 1)->where('type_of_art_work_id', $data->type_of_art_work_id)->get();
        $style = PaintingStyle::where('is_active', 1)->where('type_of_art_work_id', $data->type_of_art_work_id)->get();
        $fixInfo = FixInformation::first();
        return view('artist.art.painting-edit', compact('data', 'typeOfWork', 'category', 'technique', 'style', 'fixInfo'));
    }

    public function paintingUpdate(Painting $request)
    {
        $id = ($request->id);
        // return $request->all();
        $data = ArtistPainting::findOrFail($id);

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
            'for_commissioned_work' => $request->for_sale ? '' : $request->for_commissioned_work,
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

        return redirect()->route('artist.painting.list')->with("status", "Painting Updated Successfully");
    }

    public function paintingDelete($id)
    {
        $id = decrypt($id);
        $data = ArtistPainting::findOrFail($id);
        $data->delete();
        return redirect()->route('artist.painting.list')->with("status", "Painting Deleted Successfully");

    }

}
