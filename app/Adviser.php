<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Adviser extends Model
{
    protected $fillable = [
        'identification_type', 'identification_number', 'name', 'phone',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function actual_assigment()
    {
        return $this->hasMany('App\Assigment')
            ->where('start', '<=', Carbon::now()->toDateTimeString())
            ->where('finish', '>=', Carbon::now()->toDateTimeString());
    }

    public function assigments()
    {
        return $this->hasMany('App\Assigment');
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
}
