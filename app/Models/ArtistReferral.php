<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistReferral extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id', 'reffered_to', 'is_join', 'refferal_code'
    ];
    
}
