@extends('master')

@section('titleContent')
    <title>Add Student Page</title>
@endsection

@section('content')
    <div class="container">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">HSTU Automation Program</a>

                <!-- Navbar links -->
                <ul class="navbar-nav ml-auto flex-row">
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="{{ route('homePage') }}"><i class="fa-solid fa-house-user fa-lg"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container text-start">
        <br>
        <h3>Student Sign-up Form</h3>
        <hr>
        <form action="{{ route('updateUser', ['uid' => $user->uid]) }}" method="POST">
            @csrf
            @method('PUT')
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
                    <input type="text" class="form-control" id="uid" name="uid" placeholder="Enter Student ID" value="{{ $user->uid }}">
                </div>
                <div class="col-lg-4">
                    <label for="Full Name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-lg-4">
                    <label for="Department" class="form-label">Department</label>
                    <select name="department" class="form-select" aria-label="Default select example">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ $department->id == $student->department ? 'selected' : '' }}>{{ $department->name }}</option>
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
                            <option value="{{ $faculty->id }}" {{ $faculty->id == $student->faculty ? 'selected' : '' }}>{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Current Level" class="form-label">Current Level</label>
                    <select class="form-select" aria-label=".form-select-lg example" name="level">
                        @php
                            $levels = ['1','2','3','4','5'];
                        @endphp
                        @foreach ($levels as $level)
                            <option value="{{ $level }}" {{ $level == $student->level ? 'selected' : '' }}>{{ $level }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Current Semester" class="form-label">Current Semester</label>
                    <select class="form-select" aria-label="Default select example" name="semester">
                        @php
                            $semesters = ['i', 'ii'];
                        @endphp
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester }}" {{ $semester == $student->semester ? 'selected' : '' }}>{{ $semester }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Section" class="form-label">Section</label>
                    <select class="form-select" aria-label="Default select example" name="section">
                        @php
                            $sections = ['a', 'b', 'c'];
                        @endphp
                        @foreach ($sections as $section)
                            <option value="{{ $section }}" {{ $section == $student->section ? 'selected' : '' }}>{{ $section }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Session" class="form-label">Session</label>
                    <input type="text" class="form-control" id="session" placeholder="Enter Session" name="session" value="{{ $student->session }}">
                </div>
                <div class="col-lg-4">
                    <label for="Attached Hall" class="form-label">Attached Hall</label>
                    <select name="hall" class="form-select" aria-label="Default select example">
                        @foreach ($halls as $hall)
                            <option value="{{ $hall->id }}" {{ $hall == $hall->section ? 'selected' : '' }}>{{ $hall->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Residential Status" class="form-label">Residential Status</label>
                    <select class="form-select" aria-label="Default select example" name="residentialStatus">
                        @php
                            $residentialStatuses = ["resident", "nonResident"];
                        @endphp
                        @foreach ($residentialStatuses as $residentialStatus)
                            <option value="{{ $residentialStatus }}" {{ $residentialStatus == $student->residentialStatus ? 'selected' : '' }}>{{ $residentialStatus }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Gender" class="form-label">Gender</label><br>
                    <select class="form-select" aria-label="Default select example" name="gender">
                        @php
                            $genders = ["male", "female", "others"];
                        @endphp
                        @foreach ($genders as $gender)
                            <option value="{{ $gender }}" {{ $gender == $student->gender ? 'selected' : '' }}>{{ $gender }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Date of Birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="" value="{{ $user->dateOfBirth }}">
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Phone No." class="form-label">Phone No.</label>
                    <input type="text" class="form-control" id="mobile" placeholder="Enter your Phone Number" name="mobile" value="{{ $user->mobile }}">
                </div>
                <div class="col-lg-4">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter valid Email Address" value="{{ $user->email }}">
                </div>
                <div class="col-lg-4">
                    <label for="Board Scholarship" class="form-label">Board Scholarship</label>
                    <select class="form-select" aria-label="Default select example" name="boardScholarship">
                        @php
                            $boardScholarships = ["yes", "no"];
                        @endphp
                        @foreach ($boardScholarships as $boardScholarship)
                            <option value="{{ $boardScholarship }}" {{ $boardScholarship == $student->boardScholarship ? 'selected' : '' }}>{{ $boardScholarship }}</option>
                        @endforeach
                    </select>
                    @error('boardScholarship') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Nationality" class="form-label">Nationality</label>
                    <input type="text" class="form-control" id="nationality" placeholder="Nationality" name="nationality" value="{{ $user->nationality }}">
                </div>
                <div class="col-lg-4">
                    <label for="village" class="form-label">Village</label>
                    <input type="text" class="form-control" id="village" name="village" placeholder="Enter village" value="{{ $address->village }}">
                </div>
                <div class="col-lg-4">
                    <label for="union" class="form-label">Union</label>
                    <input type="text" class="form-control" id="union" name="union" placeholder="Enter union" value="{{ $address->union }}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="upazilla" class="form-label">Upazilla</label>
                    <input type="text" class="form-control" id="upazilla" placeholder="Enter upazilla" name="upazilla" value="{{ $address->upazilla }}">
                </div>
                @php
                    $districts = ['Bagerhat', 'Bandarban', 'Barguna', 'Barisal', 'Bhola', 'Bogra', 'Brahmanbaria', 'Chandpur', 'Chapai Nawabganj', 'Chattogram', 'Chuadanga', 'Comilla', 'Cox\'s Bazar', 'Dhaka', 'Dinajpur', 'Faridpur', 'Feni', 'Gaibandha', 'Gazipur', 'Gopalganj', 'Habiganj', 'Jamalpur', 'Jashore', 'Jhalokati', 'Jhenaidah', 'Joypurhat', 'Khagrachhari', 'Khulna', 'Kishoreganj', 'Kurigram', 'Kushtia', 'Lakshmipur', 'Lalmonirhat', 'Madaripur', 'Magura', 'Manikganj', 'Meherpur', 'Moulvibazar', 'Munshiganj', 'Mymensingh', 'Naogaon', 'Narail', 'Narayanganj', 'Narsingdi', 'Natore', 'Nawabganj', 'Netrokona', 'Nilphamari', 'Noakhali', 'Pabna', 'Panchagarh', 'Patuakhali', 'Pirojpur', 'Rajbari', 'Rajshahi', 'Rangamati', 'Rangpur', 'Satkhira', 'Shariatpur', 'Sherpur', 'Sirajganj', 'Sunamganj', 'Sylhet', 'Tangail', 'Thakurgaon'];
                    $divisions = ['Barisal', 'Chittagong', 'Dhaka', 'Khulna', 'Mymensingh', 'Rajshahi', 'Rangpur', 'Sylhet'];
                @endphp
                <div class="col-lg-4">
                    <label for="district" class="form-label">District</label>
                    <select name="district" class="form-select" aria-label="Default select example">
                        @foreach ($districts as $district)
                            <option value="{{ $district }}" {{ $district == $address->district ? 'selected' : '' }}>{{ $district }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="division" class="form-label">Division</label>
                    <select name="division" class="form-select" aria-label="Default select example">
                        @foreach ($divisions as $division)
                            <option value="{{ $division }}" {{ $division == $address->division ? 'selected' : '' }}>{{ $division }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="postCode" class="form-label">Post Code</label>
                    <input type="text" class="form-control" id="postCode" placeholder="Enter postCode" name="postCode" value="{{ $address->postCode }}">
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Update Student</button>
        </form>
    </div>
@endsection
