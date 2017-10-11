<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KioskLogs extends Model 
{

    protected $table = 'kiosk_logs';
    public $timestamps = true;

    public function kiosk()
    {
        return $this->belongsTo('App\Kiosk');
    }

}