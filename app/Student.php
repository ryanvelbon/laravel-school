<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function school() {
    	return $this->belongsTo('App\School');
    }

    public function groups() {
    	return $this->belongsToMany('App\Group');
    }

    public function lessonsAttended(){
        return $this->belongsToMany('App\Lesson', 'attendance');
    }

    public function reports() {
    	return $this->hasMany('App\Report');
    }
}
