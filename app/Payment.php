<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function student() {
    	return $this->belongsTo('App\Student');
    }
}
