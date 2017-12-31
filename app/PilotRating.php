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
        return PilotRating::find((Auth::user()->pilot_rating_id) + 1);
        //not yet checked where user rating is highest
    }

    public static function getNextRatingByRating($id)
    {
        return PilotRating::find($id + 1);
        //not yet checked where user rating is highest
    }

    public function requests()
    {
        return $this->hasManyThrough(
            'App\RequestModel', 'App\User',
            'pilot_rating_id', 'trainee_id', 'id'
        );
    }
}
