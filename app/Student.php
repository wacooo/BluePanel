<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    public $timestamps = false;

    public function logs()
    {
        return $this->belongsToMany('App\Kiosk', 'kiosk_logs', 'student_id', 'kiosk_id')
            ->withTimestamps()
            ->withPivot('type');
    }

    public function kiosks()
    {
        return $this->belongsToMany('App\Kiosk')->withTimestamps();
    }
}
