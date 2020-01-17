<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function adviser()
    {
        return $this->belongsTo('App\Adviser');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function card()
    {
        return $this->belongsTo('App\Card');
    }
}
