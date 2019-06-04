<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Subject;
use App\Tutor;
use App\SubjectLevel;
use App\Classroom;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {
        $groups = Group::orderBy('custom_id', 'asc')->get();

        return view('groups.index')
            ->with('groups', $groups)
            ->with('weekdays', Config::get('constants.weekdays'));
    }

    public function create()
    {
        return view('groups.create')
            ->with('subjects', Subject::all())
            ->with('tutors', Tutor::all())
            ->with('levels', SubjectLevel::all())
            ->with('classrooms', Classroom::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $group = new Group;

        $group->subject_id = (int) $request->input('subject');
        $group->level_id = (int) $request->input('subject-level');
        $group->tutor_id = (int) $request->input('tutor');
        $group->weekday = (int) $request->input('day');
        $group->start_time = (int) $request->input('start-time');
        $group->end_time = ((int) $request->input('start-time')) + ((int) $request->input('duration'));
        $group->classroom_id = (int) $request->input('room');

        $group->custom_id = chr(64+rand(0,26))."".chr(64+rand(0,26));


        $group->save();

        return redirect('/groups')->with('success', 'Group Added');
    }

    public function show($id)
    {
        $group = Group::find($id);

        $students_with_stats = DB::table('group_student')
                                    ->where('group_id', $id)
                                    ->orderBy('average_mark', 'desc')
                                    ->join('students', 'students.id', '=', 'group_student.student_id')
                                    ->select('students.id', 'students.first_name', 'students.last_name', 
                                            'students.sex', 'students.form', 'students.school_id', 
                                            'students.profile_pic', 'group_student.reports_count', 
                                            'group_student.lessons_count', 'group_student.average_mark')
                                    ->get();

        // $ass_st_records = DB::table('assignment_student')
        //         ->join('assignments', 'assignment_student.assignment_id', '=', 'assignments.id')
        //         ->select('assignment_student.student_id', 'assignment_student.submitted', 'assignment_student.mark', 'assignments.marks_available', 'assignments.subject_id', 'assignments.level_id')
        //         ->get();
        
        return view('groups.show')
            ->with('group', $group)
            ->with('students_with_stats', $students_with_stats)
            ->with('weekdays', Config::get('constants.weekdays'));
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
}
