<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KioskStudent extends Model
{
    protected $table = 'kiosk_student';
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
