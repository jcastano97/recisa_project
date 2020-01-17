<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function station()
    {
        return $this->belongsTo('App\Station');
    }
    
    public function card()
    {
        return $this->belongsTo('App\Card');
    }
}
