<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'amount', 'adviser_id', 'client_id', 'inventory_id'
    ];

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
