<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('students.show')->with('student', $student);
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
