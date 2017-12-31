<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    protected $table = 'requests';

    protected $fillable = [
        'trainee_id', 'training_time', 'type', 'note', 'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'trainee_id');
    }

    public function training()
    {
        return $this->hasOne('App\Training');
    }

    // public static function storeNewRequest(Request $request)
    // {
    //     $request = new RequestModel;
    //     $request->trainee_id = $request->trainee_id;
    //     $request->training_time = $request->training_time;
    //     $request->note = $request->note;
    //     $request->save();
    // }

    
}
