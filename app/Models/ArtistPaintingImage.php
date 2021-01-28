<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistPaintingImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_painting_id', 'name', 'is_primary', 'is_active',
    ];

	public function getNameAttribute($value)
    {
        if ($value) {
	        return $image = asset('storage/artist/painting/' . $value);
	    } else {
	        return asset('storage/artist/painting/default.png');
	    }
    }

}
