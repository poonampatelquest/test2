<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtCash extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id', 'art_cash_amount', 'earn_spend', 'art_cast_type'
    ];

    public function balanceLeft($date, $id)
    {
    	$earn = ArtCash::where('created_at', '<=', $date)->where('earn_spend', 'earn')->where('artist_id', $id)->sum('art_cash_amount');
    	$spend = ArtCash::where('created_at', '<=', $date)->where('earn_spend', 'spend')->where('artist_id', $id)->sum('art_cash_amount');

        return $balanceLeft = $earn - $spend;
    }

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist')->withTrashed();
    }



}
