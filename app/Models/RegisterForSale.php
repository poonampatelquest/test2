<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterForSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'contact_no', 'city', 'email', 'country_id', 'date', 'price'
    ];
}
