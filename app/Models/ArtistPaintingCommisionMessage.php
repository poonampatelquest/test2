<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistPaintingCommisionMessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'artist_id', 'artist_painting_id', 'message', 'email',
    ];

}
