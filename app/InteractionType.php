<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteractionType extends Model
{
    public function interactions(){
		return $this->hasMany('App\Interaction');
	}
}
