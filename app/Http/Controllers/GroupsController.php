<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Subject;
use App\Tutor;
use App\SubjectLevel;
use App\Classroom;
use Illuminate\Support\Facades\Config;

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
        
        return view('groups.show')
            ->with('group', $group)
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
