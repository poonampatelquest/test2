<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintingExbitionPainting extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_painting_id','painting_exbition_id','artist_id'
    ];
}
