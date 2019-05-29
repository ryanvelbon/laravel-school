<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public $timestamps = false;

    public function group() {
    	return $this->hasOne('App\Group');
    }

    public function classroom() {
    	return $this->hasOne('App\Classroom');
    }
}
