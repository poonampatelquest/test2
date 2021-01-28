<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use App\Models\ArtistPainting;

class Artist extends Authenticatable
// class Artist extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $gaurd = "artist";
    protected $fillable = [
        'name', 'email', 'country_code', 'mobile', 'password', 'fb_id', 'insta_id', 'signature_image', 'profile_image', 'background_image', 'award_achievement', 'other_content', 'referral_code', 'referred_artist_id', 'show_on_home_page', 'postion_on_homescreen', 'is_active'
    ];

    protected $appends = array('mobile_number');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getMobileNumberAttribute()
    {
        return $this->country_code.$this->mobile;
    }

    public function devices()
    {
        return $this->hasMany('App\Models\ArtistDevice');
    }

    public function getProfileImageAttribute($value)
    {
        if ($value) {
            return asset('storage/artist/profile/' . $value);
        } else {
            return asset('storage/artist/profile/default.png');
        }
    }

    public function getSignatureImageAttribute($value)
    {
        if ($value) {
            return asset('storage/artist/signature/' . $value);
        } else {
            return asset('storage/artist/signature/default.png');
        }
    }

    public function artistBackgroundImage()
    {
        $images = $this->artistPaintings();
        $image = "";

        foreach ($images as $key => $value) {
            
            $image = $value->artistPaintingImages()->where('is_primary', 1)->first();

            if(!empty($image)) {
                break;
            }
            else {

                $image = $value->artistPaintingImages()->first();
            }
        }

        if ($image) {
            return $image->painting_image;
        }
        else {
            return asset('storage/artist/painting/default.png');
        } 
    }

    public function artistPaintings()
    {
        return $this->hasMany("App\Models\ArtistPainting");
    }

    public function artistCashs()
    {
        return $this->hasMany("App\Models\ArtCash");
    }

    public function artistAllPaintings()
    {
        return $this->artistPaintings()->count();
    }

    public function artistApprovedPaintings()
    {
        return $this->artistPaintings()->where('is_approved', 1)->count();
    }

    public function artistApprovedPendingPaintings()
    {
        return $this->artistPaintings()->where('is_approved', 0)->count();
    }

    public function artistRejectedPaintings()
    {
        return $this->artistPaintings()->where('is_approved', 2)->count();
    }

    public function artistForSalePaintings()
    {
        return $this->artistPaintings()->where('for_sale', 1)->count();
    }

    public function artistRefferalPoints()
    {
        return $this->artistCashs()->where('earn_spend', 'earn')->where('art_cast_type', 'refferal')->sum('art_cash_amount');
    }

    public function artistArtCashEarn()
    {
        return $this->artistCashs()->where('earn_spend', 'earn')->sum('art_cash_amount');
    }

    public function artistArtCashSpend()
    {
        return $this->artistCashs()->where('earn_spend', 'spend')->sum('art_cash_amount');
    }

    public function artCashbalance()
    {
        $earn = $this->artistArtCashEarn();
        $spend = $this->artistArtCashSpend();
        return $balanceLeft = $earn - $spend;
    }


}
