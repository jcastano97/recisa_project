<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function recharges()
    {
        return $this->hasMany('App\Recharge');
    }

    public function discharge()
    {
        return $this->hasMany('App\Discharge');
    }

    public function inventory()
    {
        return $this->hasMany('App\Inventory')
            ->where('egress_date', '==', null);
    }

    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }

    public function purchase()
    {
        return $this->hasOne('App\Purchase');
    }
}
