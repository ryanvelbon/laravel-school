<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class LessonsController extends Controller
{
    public function updateStatus(Request $request, $id){

    	$lesson = Lesson::find($id);

    	$lesson->held = true;
    	
        $lesson->save();

        return redirect('/lessons/'.$id.'/mark-attendance')->with('success', 'Lesson\'s status updated from PENDING to HELD.');
    }

    public function markAttendance($id){
    	return 666;
    }
}
