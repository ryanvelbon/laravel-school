<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use App\School;
use App\Student;

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
        $pic;
        if($student->profile_pic){
            $pic = $student->profile_pic;
        }else{
            if($student->sex == 0){
                $pic = "m.jpg";
            }else{
                $pic = "f.jpg";
            }
        }
        return view('students.show')
            ->with('student', $student)
            ->with('pic', $pic);
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

        if($student) {
            $filename = $student->id.'_profpic'.time().'.'.request()->profile_pic->getClientOriginalExtension();

            Storage::disk('public')->put('profilepics/'.$filename, file_get_contents($request->profile_pic), 'public');

            $student->profile_pic = $filename;
            $student->save();
        }

        return 123;
    }
}
