<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KioskStudent extends Model 
{

    protected $table = 'kiosk_students';
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('Student');
    }

}