<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'vid', 'password', 'atc_rating_id', 'pilot_rating_id', 'isStaff', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function requests()
    {
        return $this->hasMany('App\RequestModel');
    }

    public function trainings()
    {
        return $this->hasMany('App\Training');
    }

    public function atcrating()
    {
        return $this->belongsTo('App\AtcRating', 'atc_rating_id');
    }

    public function pilotrating()
    {
        return $this->belongsTo('App\PilotRating', 'pilot_rating_id');
    }

    public static function getByVID($vid){
        return User::where('vid', $vid)
               ->first();
    }
}
