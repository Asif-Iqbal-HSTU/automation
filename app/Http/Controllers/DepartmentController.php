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
        //$department = Department::all();
        return view('departments.department', compact('department', 'teachers' ));
    }
}
