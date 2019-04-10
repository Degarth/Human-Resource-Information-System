<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = array('employeeId', 'fullname', 'visited', 'campus');
}
