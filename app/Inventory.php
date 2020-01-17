<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'egress_date',
    ];

    public function station()
    {
        return $this->belongsTo('App\Station');
    }
    
    public function card()
    {
        return $this->belongsTo('App\Card');
    }
}
