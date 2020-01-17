<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'enabled', 'client_id'
    ];

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
            ->whereNull('egress_date');
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
