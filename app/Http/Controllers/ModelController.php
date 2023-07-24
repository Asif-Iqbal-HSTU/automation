<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Model1;
use \App\Models\Model2;
use \App\Models\Model3;
class ModelController extends Controller
{
    //
    public function demo(Request $request)
    {
        // Retrieve the form data
        $uid = $request->input('uid');
        $name = $request->input('name');
        $district = $request->input('district');
        $division = $request->input('division');
        $level = $request->input('level');
        $semester = $request->input('semester');

        // Create Model2 instance
        $model2 = Model2::create([
            'district' => $district,
            'division' => $division,
        ]);

        // Create Model1 instance
        $model1 = Model1::create([
            'uid' => $uid,
            'name' => $name,
            'address' => $model2->id, // Use the ID of Model2 as the address
        ]);

        // Create Model3 instance
        $model3 = Model3::create([
            'sid' => $uid, // Assuming uid is the student ID
            'level' => $level,
            'semester' => $semester,
        ]);

        // Optionally, you can return a response or redirect to a success page
        return redirect()->back()->with('success', 'Data saved successfully.');

    }

    public function gotoSearch(){
        return view('search');
    }



    public function search(Request $request)
    {
        $uid = $request->input('uid');

        // Retrieve the Model1 record based on the provided uid
        $model1 = Model1::where('uid', $uid)->first();

        // If the Model1 record is found, retrieve the associated Model2 and Model3 records
        if ($model1) {
            $model2 = Model2::findOrFail($model1->address);
            $model3 = Model3::where('sid', $uid)->first();

            // Pass the retrieved data to the view
            return view('search-result', compact('model1', 'model2', 'model3'));
        }

        // If no record is found, redirect back with an error message
        return redirect()->back()->with('error', 'No record found for the provided UID.');
    }


    public function show($uid)
    {
        // Retrieve the Model1 record based on the provided uid
        $model1 = Model1::where('uid', $uid)->firstOrFail();

        // Retrieve the associated Model2 record using the address attribute of Model1
        $model2 = Model2::findOrFail($model1->address);

        // Retrieve the Model3 record based on the sid
        $model3 = Model3::where('sid', $uid)->firstOrFail();

        // Pass the retrieved data to the view
        return view('show', compact('model1', 'model2', 'model3'));
    }

    public function edit($uid)
    {
        // Retrieve the Model1 record based on the provided uid
        $model1 = Model1::where('uid', $uid)->firstOrFail();

        // Retrieve the associated Model2 record using the address attribute of Model1
        $model2 = Model2::findOrFail($model1->address);

        // Retrieve the Model3 record based on the sid
        $model3 = Model3::where('sid', $uid)->firstOrFail();

        // Pass the retrieved data to the view
        return view('edit', compact('model1', 'model2', 'model3'));
    }

    public function update(Request $request, $uid)
    {
        // Retrieve the form data
        $name = $request->input('name');
        $district = $request->input('district');
        $division = $request->input('division');
        $level = $request->input('level');
        $semester = $request->input('semester');

        // Retrieve the Model1 record based on the provided uid
        $model1 = Model1::where('uid', $uid)->firstOrFail();

        // Update the Model1 record
        $model1->name = $name;
        $model1->save();

        // Retrieve the associated Model2 record using the address attribute of Model1
        $model2 = Model2::findOrFail($model1->address);

        // Update the Model2 record
        $model2->district = $district;
        $model2->division = $division;
        $model2->save();

        // Retrieve the Model3 record based on the sid
        $model3 = Model3::where('sid', $uid)->firstOrFail();

        // Update the Model3 record
        $model3->level = $level;
        $model3->semester = $semester;
        $model3->save();

        // Optionally, you can return a response or redirect to a success page
        return redirect()->back()->with('success', 'Data updated successfully.');
    }



}
