<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function campus()
    {
        return $this->belongsTo('App\Campus');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function attendance()
    {
        return $this->hasMany('App\Attendance');
    }

    public function leave()
    {
        return $this->hasMany('App\Leave');
    }
}
