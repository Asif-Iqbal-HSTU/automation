<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCourseRequest;
use App\Models\Course;
use App\Models\Degree;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function createCoursePage($degreeID)
    {
        $degree = Degree::where('id', $degreeID)->firstOrFail();

        return view('courses.createCourse', compact('degree'));
    }

    public function createCourse(Request $request, $degreeID)
    {
        $course = Course::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'level' => $request->input('level'),
            'semester' => $request->input('semester'),
            'credit' => $request->input('credit'),
            'type' => $request->input('type'),
            'degree' => $degreeID
        ]);

        return redirect()->back()->with('success','Data Added Successfully');
    }

}
