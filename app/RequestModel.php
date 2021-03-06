<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestModel extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'requests';

    protected $fillable = [
        'trainee_id', 'training_time', 'type', 'note', 'status', 'atc_rating_id', 'pilot_rating_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'trainee_id');
    }

    public function training()
    {
        return $this->hasOne('App\Training', 'request_id');
    }

    // public static function storeNewRequest(Request $request)
    // {
    //     $request = new RequestModel;
    //     $request->trainee_id = $request->trainee_id;
    //     $request->training_time = $request->training_time;
    //     $request->note = $request->note;
    //     $request->save();
    // }

    public function atcRating()
    {
        return $this->belongsTo('App\AtcRating', 'atc_rating_id');
    }

    public function pilotRating()
    {
        return $this->belongsTo('App\PilotRating', 'pilot_rating_id');
    }
}
