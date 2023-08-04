<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Degree;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    //
    public function degreePage($degreeID){
        $degree = Degree::where('id', $degreeID)->firstOrFail();
        $teachers = Teacher::all();
        $faculties = Faculty::all();
        $courses= Course::all();
        //$department = Department::all();
        return view('degrees.degree', compact('degree', 'teachers', 'faculties', 'courses' ));
    }
}
