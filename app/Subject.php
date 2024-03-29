<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function groups(){
    	return $this->hasMany('App\Group');
    }

    public function assignments(){
    	return $this->hasMany('App\Assignment');
    }
}
