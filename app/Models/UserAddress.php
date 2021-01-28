<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class UserAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email', 'mobile', 'address_name', 'address', 'city', 'pin_code', 'state', 'other_content'
    ];

    protected $appends = array('name');

    public function getNameAttribute()
    {
        return ucwords($this->first_name. " ". $this->last_name);    
    }

}
