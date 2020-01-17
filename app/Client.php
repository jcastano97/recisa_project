<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'identification_type', 'identification_number', 'name', 'phone', 'email',
    ];

    public function card()
    {
        return $this->hasOne('App\Card');
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
}
