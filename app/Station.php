<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function inventories()
    {
        return $this->hasMany('App\Inventory')
            ->whereNull('egress_date');
    }

    public function assigments()
    {
        return $this->hasMany('App\Assigment');
    }
}
