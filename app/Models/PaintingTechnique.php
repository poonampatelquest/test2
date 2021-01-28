<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintingTechnique extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'is_active', 'type_of_art_work_id'
    ];
}
