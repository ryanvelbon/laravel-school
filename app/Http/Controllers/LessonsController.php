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

        $lesson = Lesson::find($id);

        return view('lessons.markAttendance')
            ->with('lesson', $lesson);
    }

    public function storeAttendance(Request $request, $id){

        $lesson = Lesson::find($id);

        $student_ids = $request->input('student_ids');

        foreach ($student_ids as $student_id) {
            $lesson->attendees()->attach($student_id);
        }

        return redirect('/groups/'.$lesson->group_id)->with('success', 'Student has enrolled successfully!');
    }
}
