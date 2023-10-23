<?php

namespace App\Http\Controllers;

use App\Models\Degree;
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
        $degrees = Degree::all();
        $teachers = Teacher::all();
        //$department = Department::all();
        return view('faculties.faculty', compact('faculty', 'departments', 'degrees', 'teachers' ));
    }

    public function getDegrees($faculty)
    {
        $degrees = Degree::where('faculty', $faculty)->get();
        return response()->json($degrees);
    }

    public function editFaculty($fID)
    {
        //dd($deptID);
        $faculty = Faculty::where('id', $fID)->firstOrFail();
        $teachers = Teacher::all();
        return view('faculties.editFaculty', compact('faculty', 'teachers'));
    }

    public function addFacultyPage()
    {
        //dd($deptID);
        $teachers = Teacher::all();
        return view('faculties.addFaculty', compact('teachers'));
    }


    public function createFaculty(Request $request)
    {
        //dd($deptID);
        //$department = Department::where('id', $deptID)->firstOrFail();
        //return view('departments.editDepartment', compact('department'));
        //$faculty = Faculty::where('id', $fID)->firstOrFail();
        $address = Faculty::create([
            'name' => $request->input('name'),
            'dean' => $request->input('dean'),
            'deanMessage' => $request->input('deanMessage')
        ]);

        return redirect()->back()->with('success', 'Faculty added successfully.');
    }


    public function updateFaculty(Request $request, $fID)
    {
        //dd($deptID);
        //$department = Department::where('id', $deptID)->firstOrFail();
        //return view('departments.editDepartment', compact('department'));
        $faculty = Faculty::where('id', $fID)->firstOrFail();
        $faculty->name = $request->input('name');
        $faculty->dean = $request->input('dean');
        $faculty->deanMessage = $request->input('deanMessage');
        $faculty->save();

        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
