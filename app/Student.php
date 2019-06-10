<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function school() {
    	return $this->belongsTo('App\School');
    }

    public function groups() {
    	return $this->belongsToMany('App\Group')->withPivot('reports_count', 'lessons_count', 'average_mark');
    }

    public function lessonsAttended(){
        return $this->belongsToMany('App\Lesson', 'attendance');
    }

    public function reports() {
    	return $this->hasMany('App\Report');
    }

    public function interactions() {
        return $this->hasMany('App\Interaction');
    }

    public function payments() {
        return $this->hasMany('App\Payment');
    }

    public function assignments(){
        return $this->belongsToMany('App\Assignment')->withPivot('deadline', 'submitted', 'mark');
    }
}
