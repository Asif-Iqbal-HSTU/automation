<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function departmentPage($deptID){
        $department = Department::where('id', $deptID)->firstOrFail();
        $teachers = Teacher::all();
        $faculties = Faculty::all();
        //$department = Department::all();
        return view('departments.department', compact('department', 'teachers', 'faculties' ));
    }

    public function getDepartments($faculty)
    {
        $departments = Department::where('faculty', $faculty)->get();
        return response()->json($departments);
    }

    public function editDepartment($deptID)
    {
        //dd($deptID);
        $department = Department::where('id', $deptID)->firstOrFail();
        $teachers = Teacher::all();
        $faculties = Faculty::all();
        return view('departments.editDepartment', compact('department', 'teachers', 'faculties' ));
    }

    public function updateDepartment(Request $request, $deptID)
    {
        //dd($deptID);
        //$department = Department::where('id', $deptID)->firstOrFail();
        //return view('departments.editDepartment', compact('department'));
        $department = Department::where('id', $deptID)->firstOrFail();
        $department->name = $request->input('name');
        $department->chairman = $request->input('chairman');
        $department->faculty = $request->input('faculty');
        $department->chairmanMessage = $request->input('chairmanMessage');
        $department->save();

        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
