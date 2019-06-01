<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $timestamps = false;
    
	// is this necessary???
    protected $fillable = [
    	'subject_id', 'tutor_id',
    ];

    public function subject(){
    	return $this->belongsTo('App\Subject');
    }

    public function level(){
        return $this->belongsTo('App\SubjectLevel', 'level_id');
    }

    public function tutor(){
    	return $this->belongsTo('App\Tutor');
    }

    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }

    public function students(){
        return $this->belongsToMany('App\Student');
    }

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }
}
