<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AtcRating extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public static function getNextRating()
    {
        return AtcRating::find((Auth::user()->atc_rating_id) + 1);
        //not yet checked where user rating is highest
    }

    public static function getNextRatingByRating($id)
    {
        return AtcRating::find($id + 1);
        //not yet checked where user rating is highest
    }

    public function requests()
    {
        return $this->hasManyThrough(
            'App\RequestModel', 'App\User',
            'atc_rating_id', 'trainee_id', 'id'
        );
    }

    // public function request()
    // {
    //     return $this->hasMany('App\RequestModel');
    // }
}
