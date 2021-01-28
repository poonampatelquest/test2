<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class ArtistPainting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'artist_id', 'painting_name', 'year_of_production', 'orientation', 'painting_height', 'height_unit', 'painting_width', 'width_unit', 'location', 'type_of_art_work_id', 'painting_category_id', 'painting_style_id', 'painting_technique_id', 'for_sale', 'basic_price', 'commision_precentage', 'commision_price', 'artist_recieve_price', 'painting_description', 'is_approved', 'approved_date', 'for_commissioned_work'
    ];

	protected $appends = array('height_width');


    public function artistPaintingImages()
	{
		return $this->hasMany('\App\Models\ArtistPaintingImage');
	}

	public function artist()
	{
		return $this->belongsTo('\App\Models\Artist');
	}

	public function paintingTechnique()
	{
		return $this->belongsTo('\App\Models\PaintingTechnique');
	}

	public function typeOfArtWork()
	{
		return $this->belongsTo('\App\Models\TypeOfArtWork');
	}

	public function paintingCategory()
	{
		return $this->belongsTo('\App\Models\PaintingCategory');
	}

	public function paintingStyle()
	{
		return $this->belongsTo('\App\Models\PaintingStyle');
	}

	public function isInWishList()
	{
		if(auth()->check()) {			
			$id = auth()->user()->id;
			$check = UserWishlist::where('user_id', $id)->where('artist_painting_id', $this->id)->first();
			if(empty($check))
				return false;
			else 
				return true;
		}
		return false;
		
	}

    public function getFirstImage()
	{
		$value = $this->artistPaintingImages()->first();

	    if ($value) {
	        return $value->name;
	    } else {
	        return asset('storage/artist/painting/default.png');
	    }
	}
	
    public function getHeightWidthAttribute()
    {
        return $this->painting_width."*".$this->painting_height  ." ". $this->width_unit;
    }

    function scopeWhereSize($query, $value) {

	    $query->where(\DB::raw('concat(painting_width, "*", painting_height, " ", width_unit)'), 'LIKE', "%{$value}%");
	}

    
}
