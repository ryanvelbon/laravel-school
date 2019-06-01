<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectLevel extends Model
{
    public function groups(){
    	return $this->hasMany('App\Group', 'level_id');
    }
}
