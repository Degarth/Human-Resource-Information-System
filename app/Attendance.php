<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = array('employee_id', 'visited', 'campus_id', 'from', 'to');
    
    protected $dateFormat = 'Y-m-d';

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function campus()
    {
        return $this->belongsTo('App\Campus');
    }
}
