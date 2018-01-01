<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class History extends Model
{
    protected $fillable = [
        'training_id', 'description',
    ];

    public function training()
    {
        return $this->belongsTo('App\Training');
    }
}
