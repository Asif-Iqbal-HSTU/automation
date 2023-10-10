<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class EnrollmentController extends Controller
{
    //
    public function gotoEnrollmentUploadPage()
    {
        $degrees = Degree::all();
        return view('enrollments.createEnrollmentPage', compact('degrees'));
    }

    public function addEnrollment(Request $request){
        $totalCreditHour = $request->totalCreditHour;
        $creditHourFee = $request->creditHourFee;
        $creditFee = $creditHourFee * $totalCreditHour;
        $otherFee = $request->otherFees;
        $totalFee = $otherFee + $creditFee;

        $enrollment = Enrollment::create([
            'degree' => $request->input('degree'),
            'semester' => $request->input('semester'),
            'level' => $request->input('level'),
            'totalCreditHour' => $request->input('totalCreditHour'),
            'creditHourFee' => $request->input('creditHourFee'),
            'totalCreditFee' => $creditFee,
            'otherFees' => $request->input('otherFees'),
            'totalSemesterFee' => $totalFee
        ]);
        return redirect()->back()->with('success','Data Added Successfully');
    }

    public function gotoPaymentPage($uid)
    {
        $userC = User::where('uid', $uid)->firstOrFail();
        $stuC = Student::where('sid', $uid)->firstOrFail();
        return view('exampleHosted', compact('userC', 'stuC'));
    }

    public function admitCardDownload()
    {
        $pdf = Pdf::loadView('admitCardPage');
        return $pdf->download('admitCard.pdf');

       /* return view('admitCardPage');*/
    }
}
