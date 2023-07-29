<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    //
    public function selectFacultyPage(){
        $faculties = Faculty::all();
        return view('faculties.selectFaculty', compact('faculties' ));
    }

    //
    /*public function loadFaculty(Request $request){
        $facultyID = $request->input('faculty');
        $faculty = Faculty::where('id', $facultyID)->first();
        $departments = Department::all();
        return view('faculties.faculty', compact('faculty', 'departments' ));
    }*/
    public function facultyPage($facultyID){
        $faculty = Faculty::where('id', $facultyID)->firstOrFail();
        $departments = Department::all();
        $teachers = Teacher::all();
        //$department = Department::all();
        return view('faculties.faculty', compact('faculty', 'departments', 'teachers' ));
    }
}
