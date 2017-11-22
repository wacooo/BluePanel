<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model 
{

    protected $table = 'kiosks';
    protected $fillable = ['room', 'name'];
    public $timestamps = true;

    public function students()
    {
        return $this->belongsToMany('App\Student')->withTimestamps();
    }

    public function logs()
    {
        return $this->belongstoMany('App\Student', 'kiosk_logs', 'kiosk_id', 'student_id')
            ->withTimestamps()
            ->withPivot('type');

    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function schedule()
    {
        return $this->hasMany('App\KioskSchedule');
    }


}