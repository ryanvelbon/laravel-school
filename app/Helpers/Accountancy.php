<?php
namespace App\Helpers;

class Accountancy
{
	public static function revenue_from_student($id){

    	$student = \App\Student::find($id);
    	return $student->payments->sum('amount');
	}

	public static function revenue_from_parent($id){

    	//

	}

	public static function revenue_from_teacher($id){

    	//

	}

	public static function revenue_from_course($id){

    	// by course we mean group... ??

	}

	public static function revenue_from_subject($id){

    	//

	}

	public static function revenue_total(){

		return \App\Payment::all()->sum('amount');

	}
}