<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
	public function reports(){
		return $this->hasMany('App\Report');
	}
}
