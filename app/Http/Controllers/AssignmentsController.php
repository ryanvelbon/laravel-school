<?php

namespace App\Http\Controllers;

use App\Helpers\AllahuFoobar;

use App\Assignment;
use App\Group;
use App\Subject;
use App\SubjectLevel;
use App\AssignmentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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

        foreach ($student_ids as $student_id) {
            $assignment->students()->attach($student_id, ['deadline' => $deadline, 'submitted' => 0, 'mark' => 0]);
        }

        return redirect('/groups/'.$group_id)->with('success', 'Students have been assigned task!');
    }
}
