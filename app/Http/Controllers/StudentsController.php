<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Config;


use App\School;
use App\Student;
use App\Payment;
use App\Group;
use App\Report;

class StudentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => []]);
    }

    public function index()
    {
        $students = Student::orderBy('first_name', 'asc')->get();

        return view('students.index')
            ->with('students', $students);
    }

    public function create()
    {
        $schools = School::all();
        return view('students.create')
            ->with('schools', $schools);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first-name' => 'required',
            'email-parent' => 'email',
            'email-student' => 'email',
            // 'mobile-parent' => 
            //     array(
            //         'required',
            //         'regex:/'
            //     ),
        ]);

        $student = new Student;
        $student->first_name = $request->input('first-name');
        $student->last_name = $request->input('last-name');
        $student->sex = (bool) $request->input('sex');
        $student->form = $request->input('school-year');
        $student->school_id = (int) $request->input('school');
        $student->email1 = $request->input('email-parent');
        $student->email2 = $request->input('email-student');
        $student->mob1 = $request->input('mobile-parent');
        $student->mob2 = $request->input('mobile-student');

        $student->save();

        return redirect('/students')->with('success', 'Student Added');
    }

    public function show($id)
    {
        $student = Student::find($id);
        $payments = Payment::where('student_id', $id)->get();
        $groups_not_part_of = Group::whereNotIn('id', $student->groups->pluck('id'))->get();

        return view('students.show')
            ->with('student', $student)
            ->with('payments', $payments)
            ->with('groups_not_part_of', $groups_not_part_of)
            ->with('assignment_types', Config::get('constants.assignment_types'));
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

    public function changePic(Request $request, $id)
    {
        $this->validate($request, [
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $student = Student::find($id);

        $filename = $student->id.'_profpic'.time().'.'.request()->profile_pic->getClientOriginalExtension();

        Storage::disk('public')->put('profilepics/'.$filename, file_get_contents($request->profile_pic), 'public');

        $student->profile_pic = $filename;
        $student->save();

        return redirect('/students/'.$id)->with('success', 'Profile Pic updated!');
    }

    public function joinGroup(Request $request, $id)
    {
        // validation

        $student = Student::find($id);

        $group_id = (int) $request->input('group-to-join');

        $student->groups()->attach($group_id);

        return redirect('/students/'.$id)->with('success', 'Student has enrolled successfully!');
    }

    public function receiveReport(Request $request, $id)
    {
        $report = new Report;

        $report->student_id = $id;
        $report->report_type_id = (int) $request->input('report-type');
        $report->text = $request->input('text');
        $report->date = $request->input('report-date');

        $report->save();

        return redirect('/students/'.$id)->with('success', 'Report has been filed.');
    }
}
