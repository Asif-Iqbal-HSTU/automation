<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function currentUser()
    {
        $user = session()->get('loginUser');
        //dd($user);
        $departments = Department::all();
        $faculties = Faculty::all();
        $halls = Hall::all();

        //$uid = $request->input('uid');
        $uid = $user->uid;
        if($user->role == 'superAdmin'){
            //dd($user);
            return view('superAdmins.superAdminProfile');
        }
        // Retrieve the Model1 record based on the provided uid
        //$user = User::where('uid', $uid)->first();

        // If the Model1 record is found, retrieve the associated Model2 and Model3 records
        if ($user) {
            $address = Address::findOrFail($user->address);
            $student = Student::where('sid', $uid)->first();
            $teacher = Teacher::where('tid', $uid)->first();

            // Pass the retrieved data to the view
            if($user->role == 'student'){
                return view('students.studentProfile', compact('user', 'address', 'student', 'departments', 'faculties', 'halls'));
            }
            elseif($user->role == 'teacher'){
                return view('teachers.teacherProfile', compact('user', 'address', 'teacher', 'departments', 'faculties'));
            }
        }

        // If no record is found, redirect back with an error message
        return redirect()->back()->with('error', 'No record found for the provided UID.');
    }
}
