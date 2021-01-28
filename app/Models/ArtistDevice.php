<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistDevice extends Model
{
    use HasFactory;
    protected $fillable = [
        'artist_id', 'device', 'device_token'
    ];
}
