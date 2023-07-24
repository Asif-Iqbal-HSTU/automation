<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Address;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Hall;

class LoginController extends Controller
{
    //
    public function loginUser(Request $request){
        $user = \App\Models\User::where('uid',$request->get('uid'))->first();

        if($user == null){
            return redirect()->back()->with('error','UID not valid');
        }

        if (!Hash::check($request->get('password'), $user->password)){
            return redirect()->back()->with('error','Wrong Password');
        }

        /*if ($request->get('password') != $student->password){
            return redirect()->back();
        }*/

        else{
            \Illuminate\Support\Facades\Session::put('loginUser', $user);
            \Illuminate\Support\Facades\Session::put('user_role', $user->role);
            //return redirect()->route('studentHomePage');

            //return view('studentHomePage') -> with(['student'=>$student]);
        }

        /*\Illuminate\Support\Facades\Session::put('user_id', $student);
        \Illuminate\Support\Facades\Session::put('user_type', $student->userType);*/

        /*if($user->role == 'superAdmin'){
            return redirect()->route('superAdminDashboard');
        }

        if($user->role == 'student'){
            return redirect()->route('studentDashboard');
        }*/


        if($user->role == "superAdmin"){
            return view('superadmins.superadminProfile');
        }

        if($user->role == 'student'){
            $departments = Department::all();
            $faculties = Faculty::all();
            $halls = Hall::all();
            $uid = $user->uid;

            $address = Address::findOrFail($user->address);
            $student = Student::where('sid', $uid)->first();
            $teacher = Teacher::where('tid', $uid)->first();
            return view('students.studentProfile', compact('user', 'address', 'student', 'departments', 'faculties', 'halls'));
        }

        if($user->role == 'teacher'){
            $departments = Department::all();
            $faculties = Faculty::all();
            $halls = Hall::all();
            $uid = $user->uid;

            $address = Address::findOrFail($user->address);
            $student = Student::where('sid', $uid)->first();
            $teacher = Teacher::where('tid', $uid)->first();
            return view('teachers.teacherProfile', compact('user', 'address', 'teacher', 'departments', 'faculties'));
        }
    }

    public function logout(){
        \Illuminate\Support\Facades\Session::forget('loginUser');
        \Illuminate\Support\Facades\Session::forget('user_role');
        return redirect()->route('home');
    }

    public function gotoUpdatePassword(){
        return view('users.updatePasswordPage');
    }


    public function editPassword($uid)
    {
        $user = User::where('uid', $uid)->firstOrFail();
        return view('users.updatePasswordPage', compact('user'));
    }

    public function updatePassword(Request $request, $uid){
        $currentPassword = $request->input('currentPassword');
        $p = $request->input('newPassword');
        $password = Hash::make($p);

        // Retrieve the Model1 record based on the provided uid
        $user = User::where('uid', $uid)->firstOrFail();

        if (!Hash::check($currentPassword, $user->password)){
            return redirect()->back()->with('error','Wrong Password');
        }



        $user->password = $password;
        $user->save();
        return redirect()->back()->with('success','Password Updated! Login again!');
    }
}
