<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Group;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
