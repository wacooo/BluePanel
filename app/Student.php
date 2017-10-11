<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model 
{

    protected $table = 'students';
    public $timestamps = false;

    public function logs()
    {
        return $this->hasMany('App\KioskLogs');
    }

}