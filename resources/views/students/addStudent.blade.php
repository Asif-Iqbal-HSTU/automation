@extends('master')

@section('titleContent')
    <title>Add Student Page</title>
@endsection

@section('content')
    <div class="container text-start">
        <br>
        <h3>Student Sign-up Form</h3>
        <hr>
        <form action="{{ route('addStudent') }}" method="POST">
            @csrf
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </div>
            @endif

            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4">
                    <label for="Student ID" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="uid" name="uid" placeholder="Enter Student ID">
                </div>
                <div class="col-lg-4">
                    <label for="Full Name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                </div>
                <div class="col-lg-4">
                    <label for="Department" class="form-label">Department</label>
                    <select name="department" class="form-select" aria-label="Default select example">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Faculty" class="form-label">Faculty</label>
                    <select name="faculty" class="form-select" aria-label="Default select example">
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Current Level" class="form-label">Current Level</label>
                    <select class="form-select" aria-label=".form-select-lg example" name="level">
                        <option selected>Open this select menu</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Current Semester" class="form-label">Current Semester</label>
                    <select class="form-select" aria-label="Default select example" name="semester">
                        <option selected>Open this select menu</option>
                        <option value="i">I</option>
                        <option value="ii">II</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Section" class="form-label">Section</label>
                    <select class="form-select" aria-label="Default select example" name="section">
                        <option selected>Open this select menu</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Session" class="form-label">Session</label>
                    <input type="text" class="form-control" id="session" placeholder="Enter Session" name="session">
                </div>
                <div class="col-lg-4">
                    <label for="Attached Hall" class="form-label">Attached Hall</label>
                    <select name="hall" class="form-select" aria-label="Default select example">
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Residential Status" class="form-label">Residential Status</label>
                    <select class="form-select" aria-label="Default select example" name="residentialStatus">
                        <option selected>Open this select menu</option>
                        <option value="Resident">Resident</option>
                        <option value="nonResident">Non Resident</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Gender" class="form-label">Gender</label><br>
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option selected>Open this select menu</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Date of Birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="">
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Phone No." class="form-label">Phone No.</label>
                    <input type="text" class="form-control" id="mobile" placeholder="Enter your Phone Number" name="mobile">
                </div>
                <div class="col-lg-4">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter valid Email Address">
                </div>
                <div class="col-lg-4">
                    <label for="Board Scholarship" class="form-label">Board Scholarship</label>
                    <select class="form-select" aria-label="Default select example" name="boardScholarship">
                        <option selected>Open this select menu</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    @error('boardScholarship') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Nationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control" id="nationality" placeholder="Nationality" name="nationality">
                </div>
                <div class="col-lg-4">
                    <label for="village" class="form-label">Village</label>
                    <input type="text" class="form-control" id="village" name="village" placeholder="Enter village">
                </div>
                <div class="col-lg-4">
                    <label for="union" class="form-label">Union</label>
                    <input type="text" class="form-control" id="union" name="union" placeholder="Enter union">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="upazilla" class="form-label">Upazilla</label>
                    <input type="text" class="form-control" id="upazilla" placeholder="Enter upazilla" name="upazilla">
                </div>
                @php
                    $districts = ['Bagerhat', 'Bandarban', 'Barguna', 'Barisal', 'Bhola', 'Bogra', 'Brahmanbaria', 'Chandpur', 'Chapai Nawabganj', 'Chattogram', 'Chuadanga', 'Comilla', 'Cox\'s Bazar', 'Dhaka', 'Dinajpur', 'Faridpur', 'Feni', 'Gaibandha', 'Gazipur', 'Gopalganj', 'Habiganj', 'Jamalpur', 'Jashore', 'Jhalokati', 'Jhenaidah', 'Joypurhat', 'Khagrachhari', 'Khulna', 'Kishoreganj', 'Kurigram', 'Kushtia', 'Lakshmipur', 'Lalmonirhat', 'Madaripur', 'Magura', 'Manikganj', 'Meherpur', 'Moulvibazar', 'Munshiganj', 'Mymensingh', 'Naogaon', 'Narail', 'Narayanganj', 'Narsingdi', 'Natore', 'Nawabganj', 'Netrokona', 'Nilphamari', 'Noakhali', 'Pabna', 'Panchagarh', 'Patuakhali', 'Pirojpur', 'Rajbari', 'Rajshahi', 'Rangamati', 'Rangpur', 'Satkhira', 'Shariatpur', 'Sherpur', 'Sirajganj', 'Sunamganj', 'Sylhet', 'Tangail', 'Thakurgaon'];
                    $divisions = ['Barisal', 'Chittagong', 'Dhaka', 'Khulna', 'Mymensingh', 'Rajshahi', 'Rangpur', 'Sylhet'];
                @endphp
                <div class="col-lg-4">
                    <label for="district" class="form-label">District</label>
                    <select name="district" class="form-select" aria-label="Default select example">
                        @foreach ($districts as $district)
                            <option value="{{ $district }}">{{ $district }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="division" class="form-label">Division</label>
                    <select name="division" class="form-select" aria-label="Default select example">
                        @foreach ($divisions as $division)
                            <option value="{{ $division }}">{{ $division }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="postCode" class="form-label">Post Code</label>
                    <input type="text" class="form-control" id="postCode" placeholder="Enter postCode" name="postCode">
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Add Student</button>
        </form>
    </div>
@endsection