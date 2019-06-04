<?php

namespace App\Http\Controllers;

use App\Helpers\AllahuFoobar;

use App\Assignment;
use App\Group;
use App\Student;
use App\Subject;
use App\SubjectLevel;
use App\AssignmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class AssignmentsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $subjects = Subject::all();
        $levels = SubjectLevel::all();
        $assignment_types = AssignmentType::all();

        return view('assignments.create')
            ->with('subjects', $subjects)
            ->with('levels', $levels)
            ->with('weightings', Config::get('constants.assignment_weightings'))
            ->with('types', $assignment_types);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
      
        ]);

        $ass = new Assignment;

        $ass->custom_id = AllahuFoobar::randomAlphanumericId(4);
        $ass->title = $request->input('title');
        $ass->assignment_type_id = (int) $request->input('assignment-type');
        $ass->marks_available = $request->input('marks-available');
        $ass->pass_mark = $request->input('pass-mark');
        $ass->subject_id = (int) $request->input('subject');
        $ass->level_id = (int) $request->input('subject-level');

        $ass->save();

        return redirect('/groups')->with('success', 'Assignment Created');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function assign($group_id)
    {
        $group = Group::find($group_id);
        $students = $group->students;
        $relevant_assignments = Assignment::where('subject_id', $group->subject_id)
                                          ->where('level_id', $group->level_id)
                                          ->get();

        return view('assignments.assign')
            ->with('students', $students)
            ->with('relevant_assignments', $relevant_assignments);
    }

    public function assignStore(Request $request)
    {
        $this->validate($request, [
            'assignment' => 'required',
            'deadline' => 'required',
        ]);

        $assignment = Assignment::find($request->input('assignment'));
        $deadline = $request->input('deadline');
        $student_ids = $request->input('student_ids');
        $group_id = $request->input('group_id');

        $students_skipped_ids = [];

        foreach ($student_ids as $student_id) {
            // if student has already been assigned this assignment
            if(DB::table('assignment_student')
                    ->where('assignment_id', $assignment->id)
                    ->where('student_id', $student_id)
                    ->first()){
                // skip
                array_push($students_skipped_ids, $student_id);
            }else{
                // else create record
                $assignment->students()->attach($student_id, ['deadline' => $deadline, 'submitted' => 0, 'mark' => 0]);
            }
        }

        if($students_skipped_ids){
            $alert_type = 'warning';
            $message = 'Note that the following students have already been assigned Assignment ' . $assignment->custom_id . ": \n";
            foreach ($students_skipped_ids as $student_id) {
                $message .= Student::find($student_id)->first_name . "\n";
            }
            $message .= "These students have therefore been skipped.";
        }else{
            $alert_type = 'success';
            $message = 'Students have been assigned task!';
        }

        return redirect('/groups/'.$group_id)->with($alert_type, $message);
    }
}
