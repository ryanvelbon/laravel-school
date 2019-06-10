<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    public function student(){
		return $this->belongsTo('App\Student');
	}

	public function type(){
		return $this->belongsTo('App\InteractionType', 'interaction_type_id');
	}
}
