<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Address;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Hall;
use App\Models\Enrollment;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    //
    public function __constuct(){
        $this->middleware('user.auth');
    }

    public function gotoSuperAdminDashboard(){
        return view('dashboards.superAdminDashboard');
    }

    public function addUserPage(){
        return view('demoForm');
    }

    public function addStudentPage(){
        $departments = Department::all();
        $degrees = Degree::all();
        $faculties = Faculty::all();
        $halls = Hall::all();
        return view('students.addStudent', compact('degrees', 'faculties', 'halls'));
    }

    public function addTeacherPage(){
        $departments = Department::all();
        $faculties = Faculty::all();
        return view('teachers.addTeacher', compact('departments', 'faculties'));
    }

    public function addStudent(Request $request){
        // Retrieve the form data
        $uid = $request->input('uid');
        $gender = $request->input('gender');
        $dateOfBirth = $request->input('dateOfBirth');
        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $nationality = $request->input('nationality');
        $village = $request->input('village');
        $union = $request->input('union');
        $upazilla = $request->input('upazilla');
        $district = $request->input('district');
        $division = $request->input('division');
        $postCode = $request->input('postCode');
        $password = Hash::make('password');
        $role = 'student';
        $name = $request->input('name');
        //$department = $request->input('department');
        $faculty = $request->input('faculty');
        $degree = $request->input('degree');
        $level = $request->input('level');
        $semester = $request->input('semester');
        $section = $request->input('section');
        $session = $request->input('session');
        $hall = $request->input('hall');
        $residentialStatus = $request->input('residentialStatus');
        $boardScholarship = $request->input('boardScholarship');
        // Create Model2 instance
        $address = Address::create([
            'village' => $village,
            'union' => $union,
            'upazilla' => $upazilla,
            'district' => $district,
            'division' => $division,
            'postCode' => $postCode
        ]);

        // Create Model1 instance
        $user = User::create([
            'uid' => $uid,
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'role' => $role,
            'gender' => $gender,
            'dateOfBirth' => $dateOfBirth,
            'mobile' => $mobile,
            'nationality' => $nationality,
            'address' => $address->id // Use the ID of Address as the address
        ]);

        // Create Model3 instance
        $student = Student::create([
            'sid' => $uid, // Assuming uid is the student ID
            'degree' => $degree,
            'faculty' => $faculty,
            'session' => $session,
            'semester' => $semester,
            'level' => $level,
            'semester' => $semester,
            'section' => $section,
            'hall' => $hall,
            'residentialStatus' => $residentialStatus,
            'boardScholarship' => $boardScholarship
        ]);
        return redirect()->back()->with('success','Data Added Successfully');
    }

    public function addTeacher(Request $request){
        // Retrieve the form data
        $uid = $request->input('uid');
        $name = $request->input('name');
        $department = $request->input('department');
        $faculty = $request->input('faculty');
        $designation = $request->input('designation');
        $gender = $request->input('gender');
        $dateOfBirth = $request->input('dateOfBirth');
        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $boardScholarship = $request->input('boardScholarship');
        $nationality = $request->input('nationality');
        $village = $request->input('village');
        $union = $request->input('union');
        $upazilla = $request->input('upazilla');
        $district = $request->input('district');
        $division = $request->input('division');
        $postCode = $request->input('postCode');
        $password = Hash::make('password');
        $role = 'teacher';
        // Create Model2 instance
        $address = Address::create([
            'village' => $village,
            'union' => $union,
            'upazilla' => $upazilla,
            'district' => $district,
            'division' => $division,
            'postCode' => $postCode
        ]);

        // Create Model1 instance
        $user = User::create([
            'uid' => $uid,
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'role' => $role,
            'gender' => $gender,
            'dateOfBirth' => $dateOfBirth,
            'mobile' => $mobile,
            'nationality' => $nationality,
            'address' => $address->id // Use the ID of Address as the address
        ]);

        // Create Model3 instance
        $teacher = Teacher::create([
            'tid' => $uid, // Assuming uid is the teacher ID
            'department' => $department,
            'faculty' => $faculty,
            'designation' => $designation
        ]);

        return redirect()->back()->with('success','Data Added Successfully');
    }

    public function gotoSearchUser(){
        return view('users.searchUser');
    }

    public function searchUser(Request $request)
    {
        $departments = Department::all();
        $degrees = Degree::all();
        $faculties = Faculty::all();
        $halls = Hall::all();
        $enrollments = Enrollment::all();
        $currentDate = Carbon::now();

        $uid = $request->input('uid');

        // Retrieve the Model1 record based on the provided uid
        $user = User::where('uid', $uid)->first();

        // If the Model1 record is found, retrieve the associated Model2 and Model3 records
        if ($user) {
            $address = Address::findOrFail($user->address);
            $student = Student::where('sid', $uid)->first();
            $teacher = Teacher::where('tid', $uid)->first();

            // Pass the retrieved data to the view
            if($user->role == 'student'){
                return view('students.studentProfile', compact('user', 'address', 'student', 'departments', 'degrees', 'faculties', 'halls', 'enrollments', 'currentDate'));
            }
            elseif($user->role == 'teacher'){
                return view('teachers.teacherProfile', compact('user', 'address', 'teacher', 'departments', 'faculties'));
            }
        }

        // If no record is found, redirect back with an error message
        return redirect()->back()->with('error', 'No record found for the provided UID.');
    }

    public function editUser($uid)
    {
        $departments = Department::all();
        $degrees = Degree::all();
        $faculties = Faculty::all();
        $halls = Hall::all();
        // Retrieve the Model1 record based on the provided uid
        $user = User::where('uid', $uid)->firstOrFail();

        // Retrieve the associated Model2 record using the address attribute of Model1
        $address = Address::findOrFail($user->address);

        // Retrieve the Model3 record based on the sid
        // Pass the retrieved data to the view
        if($user->role == 'student'){
            $student = Student::where('sid', $uid)->firstOrFail();
            return view('students.editStudentProfile', compact('user', 'address', 'student', 'departments', 'degrees', 'faculties', 'halls'));
        }
        elseif($user->role == 'teacher'){
            $teacher = teacher::where('tid', $uid)->firstOrFail();
            return view('teachers.editTeacherProfile', compact('user', 'address', 'teacher', 'departments', 'faculties'));
        }
    }

    public function editStudentSpecificProperty($uid)
    {

        $user = User::where('uid', $uid)->firstOrFail();

        // Retrieve the associated Model2 record using the address attribute of Model1
        $address = Address::findOrFail($user->address);

        // Retrieve the Model3 record based on the sid
        // Pass the retrieved data to the view
        if($user->role == 'student'){
            $student = Student::where('sid', $uid)->firstOrFail();
            return view('students.editSpecificProperties', compact('user', 'address', 'student'));
        }
        elseif($user->role == 'teacher'){
            $teacher = teacher::where('tid', $uid)->firstOrFail();
            return view('students.editSpecificProperties', compact('user', 'address', 'teacher'));
        }
    }



    public function updateStudentSpecificProperty(Request $request, $uid)
    {
        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $village = $request->input('village');
        $union = $request->input('union');
        $upazilla = $request->input('upazilla');
        $district = $request->input('district');
        $division = $request->input('division');
        $postCode = $request->input('postCode');

        $user = User::where('uid', $uid)->firstOrFail();
        $user->mobile = $mobile;
        $user->email = $email;
        $user->save();

        $address = Address::findOrFail($user->address);
        $address->village = $village;
        $address->union = $union;
        $address->upazilla = $upazilla;
        $address->district = $district;
        $address->division = $division;
        $address->postCode = $postCode;
        $address->save();

        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    public function updateUser(Request $request, $uid)
    {
        $name = $request->input('name');
        $uid = $request->input('uid');
        $gender = $request->input('gender');
        $dateOfBirth = $request->input('dateOfBirth');
        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $nationality = $request->input('nationality');
        $village = $request->input('village');
        $union = $request->input('union');
        $upazilla = $request->input('upazilla');
        $district = $request->input('district');
        $division = $request->input('division');
        $postCode = $request->input('postCode');
        $password = Hash::make('password');
        $role = 'student';

        // Retrieve the Model1 record based on the provided uid
        $user = User::where('uid', $uid)->firstOrFail();

        $user->name = $name;
        $user->uid = $uid;
        $user->gender = $gender;
        $user->dateOfBirth = $dateOfBirth;
        $user->mobile = $mobile;
        $user->email = $email;
        $user->nationality = $nationality;
        $user->mobile = $mobile;
        $user->email = $email;
        $user->save();

        $address = Address::findOrFail($user->address);

        // Update the Model2 record
        $address->village = $village;
        $address->union = $union;
        $address->upazilla = $upazilla;
        $address->district = $district;
        $address->division = $division;
        $address->postCode = $postCode;
        $address->save();

        if($user->role == "student"){
            $department = $request->input('department');
            $degree = $request->input('degree');
            $faculty = $request->input('faculty');
            $level = $request->input('level');
            $semester = $request->input('semester');
            $section = $request->input('section');
            $session = $request->input('session');
            $hall = $request->input('hall');
            $residentialStatus = $request->input('residentialStatus');
            $boardScholarship = $request->input('boardScholarship');

            $student = Student::where('sid', $uid)->firstOrFail();
            // Update the Model3 record
            //$student->department = $department;
            $student->degree = $degree;
            $student->faculty = $faculty;
            $student->level = $level;
            $student->semester = $semester;
            $student->section = $section;
            $student->session = $session;
            $student->hall = $hall;
            $student->residentialStatus = $residentialStatus;
            $student->boardScholarship = $boardScholarship;
            $student->save();
        }
        elseif($user->role == "teacher"){
            $department = $request->input('department');
            $faculty = $request->input('faculty');
            $designation = $request->input('designation');

            $teacher = Teacher::where('tid', $uid)->firstOrFail();

            $teacher->department = $department;
            $teacher->faculty = $faculty;
            $teacher->designation = $designation;
            $teacher->save();
        }

        // Optionally, you can return a response or redirect to a success page
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
