<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    public $timestamps = false;

    public function groups(){
    	return $this->hasMany('App\Group');
    }
}
