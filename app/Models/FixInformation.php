<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_amount', 'referral_amount', 'painting_commision',
    ];
}
