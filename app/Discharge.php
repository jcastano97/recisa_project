<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discharge extends Model
{
    public function card()
    {
        return $this->belongsTo('App\Card');
    }
}
