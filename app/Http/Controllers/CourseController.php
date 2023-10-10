<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCourseRequest;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Teacher;
use App\Models\CourseDistribution;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function createCoursePage($degreeID)
    {
        $degree = Degree::where('id', $degreeID)->firstOrFail();
        return view('courses.createCourse', compact('degree'));
    }

    public function createCourse(AddCourseRequest $request, $degreeID)
    {
        $course = Course::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'level' => $request->input('level'),
            'semester' => $request->input('semester'),
            'credit' => $request->input('credit'),
            'type' => $request->input('type'),
            'degree' => $degreeID,
        ]);

        return redirect()->back()->with('success','Data Added Successfully');
    }

    public function coursePage($courseID)
    {
        $course = Course::where('id', $courseID)->firstOrFail();
        $degrees = Degree::all();

        return view('courses.course', compact('course', 'degrees'));
    }

    public function courseDistributionPage()
    {
        $courses = Course::all();
        $degrees = Degree::all();
        $teachers = Teacher::all();

        return view('courses.courseDistribution', compact('courses', 'degrees', 'teachers'));
    }

    public function addCourseDistribution(Request $request){
        // Retrieve the form data

        // Create Model3 instance
        $courseDistribution = CourseDistribution::create([
            'degree' => $request->input('degree'),
            'code' => $request->input('code'),
            'academicYear' => $request->input('academicYear'),
            'session' => $request->input('session'),
            'semester' => $request->input('semester'),
            'level' => $request->input('level'),
            'section' => $request->input('section'),
            'teacher' => $request->input('teacher'),
        ]);

        return redirect()->back()->with('success','Data Added Successfully');
    }

    public function distributedCourseList($uid){
        $teacherID = $uid;
        $courses = CourseDistribution::where('teacher', $teacherID)->get();
        return view('teachers.assignedCourses', compact('courses', 'teacherID'));
    }

}
