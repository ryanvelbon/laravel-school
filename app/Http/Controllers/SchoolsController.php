<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use App\School;

class SchoolsController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('title', 'asc')->get();

        return view('schools.index')
            ->with('schools', $schools)
            ->with('school_types', Config::get('constants.school_types'));
    }
}
