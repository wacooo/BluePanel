<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model 
{

    protected $table = 'kiosks';
    public $timestamps = true;

    public function students()
    {
        return $this->hasMany('App\KioskStudent');
    }

    public function users(){
        return $this->belongsToMany('App\User','kiosk_users');
    }

}