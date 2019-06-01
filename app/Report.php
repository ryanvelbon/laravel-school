<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
	public function student(){
		return $this->belongsTo('App\Student');
	}

	public function type(){
		return $this->belongsTo('App\ReportType', 'report_type_id');
	}
}