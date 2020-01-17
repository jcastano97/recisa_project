<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public function inventories()
    {
        return $this->hasMany('App\Inventory')
            ->where('egress_date', '=', null);
    }
}
