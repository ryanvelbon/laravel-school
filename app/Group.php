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
    	return $this->hasOne('App\Subject');
    }

    public function level(){
        return $this->hasOne('App\SubjectLevel');
    }

    public function tutor(){
    	return $this->hasOne('App\Tutor');
    }

    public function classroom(){
        return $this->hasOne('App\Classroom');
    }

    public function students(){
        return $this->belongsToMany('App\Student');
    }

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }
}
