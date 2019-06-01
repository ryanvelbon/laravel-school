<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public $timestamps = false;

    public function subject(){
    	return $this->belongsTo('App\Subject');
    }

    public function level(){
        return $this->belongsTo('App\SubjectLevel', 'level_id');
    }
}
