<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function campus()
    {
        return $this->belongsTo('App\Campus');
    }
}
