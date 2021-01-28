<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'artist_painting_id', 'artist_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function artistPainting()
    {
        return $this->belongsTo('App\Models\ArtistPainting');
    }



}
