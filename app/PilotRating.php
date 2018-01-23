<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PilotRating extends Model
{
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public static function getNextRating()
    {
        if(Auth::user()->pilot_rating_id == 10){
            return PilotRating::find(10);
        }
        return PilotRating::find((Auth::user()->pilot_rating_id) + 1);
    }

    public static function getNextRatingByRating($id)
    {
        if ($id == 10) {
            return PilotRating::find($id);
        }
        return PilotRating::find($id + 1);
    }

    public function requests()
    {
        return $this->hasManyThrough(
            'App\RequestModel', 'App\User',
            'pilot_rating_id', 'trainee_id', 'id'
        );
    }

    // public function request()
    // {
    //     return $this->hasMany('App\RequestModel');
    // }
}
