<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'request_id', 'trainer_id', 'note',
    ];

    public function trainer()
    {
        return $this->belongsTo('App\User', 'trainer_id');
    }

    public function request()
    {
        return $this->belongsTo('App\RequestModel', 'request_id');
    }

    public function history()
    {
        return $this->hasOne('App\History');
    }
}
