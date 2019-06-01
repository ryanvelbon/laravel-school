<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $timestamps = false;

    public function group() {
    	return $this->belongsTo('App\Group');
    }

    public function classroom() {
    	return $this->belongsTo('App\Classroom');
    }

    // Students who have attended lesson.
    public function attendees(){
        return $this->belongsToMany('App\Student', 'attendance');
    }
}
