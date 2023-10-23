@extends('master')

@section('titleContent')
    <title>Add Teacher Page</title>
    <script>
        document.getElementById('faculty').addEventListener('change', function() {
            var faculty = this.value;
            fetch('/departments/' + faculty)
                .then(response => response.json())
                .then(data => {
                    var departmentSelect = document.getElementById('department');
                    departmentSelect.innerHTML = '';

                    data.forEach(function(department) {
                        var option = document.createElement('option');
                        option.value = department.id; // Replace 'id' with your department's primary key
                        option.text = department.name; // Replace 'name' with the department's name attribute
                        departmentSelect.appendChild(option);
                    });
                });
        });
    </script>
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
        <h3>Teacher Adding Form</h3>
        <hr>
        <form action="{{ route('addTeacher') }}" method="POST">
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
                    <label for="uid" class="form-label">Teacher ID</label>
                    <input type="text" class="form-control" id="uid" name="uid" placeholder="Teacher ID (Auto Generated)" disabled>
                </div>
                <div class="col-lg-4">
                    <label for="Full Name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                </div>
                <div class="col-lg-4">
                    <label for="Faculty" class="form-label">Faculty</label>
                    <select name="faculty" id="faculty" class="form-select" aria-label="Default select example">
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Department" class="form-label">Department</label>
                    <select name="department" id="department" class="form-select" aria-label="Default select example">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="designation" class="form-label">Enter Designation</label>
                    <select class="form-select" aria-label=".form-select-lg example" name="designation">
                        <option selected>Open this select menu</option>
                        <option value="lecturer">Lecturer</option>
                        <option value="assistant professor">Assistant Professor</option>
                        <option value="assosiate professor">Assosiate Professor</option>
                        <option value="professor">Professor</option>
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

            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="Date of Birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="">
                </div>
                <div class="col-lg-4">
                    <label for="Phone No." class="form-label">Phone No.</label>
                    <input type="text" class="form-control" id="mobile" placeholder="Enter your Phone Number" name="mobile">
                </div>
                <div class="col-lg-4">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address (Auto Generated)" disabled>
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
            <button class="btn btn-primary" type="submit">Add Teacher</button>
        </form>
    </div>
    <script>
        document.getElementById('faculty').addEventListener('change', function() {
            var faculty = this.value;
            fetch('/departments/' + faculty)
                .then(response => response.json())
                .then(data => {
                    var departmentSelect = document.getElementById('department');
                    departmentSelect.innerHTML = '';

                    data.forEach(function(department) {
                        var option = document.createElement('option');
                        option.value = department.id; // Replace 'id' with your department's primary key
                        option.text = department.name; // Replace 'name' with the department's name attribute
                        departmentSelect.appendChild(option);
                    });
                });
        });
    </script>
    <script>
        // Function to update the Teacher ID based on Full Name
        function updateTeacherID() {
            // Get the Full Name input and Teacher ID input elements
            var fullNameInput = document.getElementById('name');
            var teacherIDInput = document.getElementById('uid');

            // Get the value entered in the Full Name input
            var fullName = fullNameInput.value;

            // Split the full name into parts using spaces
            var nameParts = fullName.split(' ');

            // Check if there are at least two parts (first name and last name)
            if (nameParts.length >= 2) {
                // Extract the last name and construct the Teacher ID
                var lastName = nameParts[nameParts.length - 1];
                var beforeLastName = nameParts[nameParts.length - 2];
                var teacherID = beforeLastName + '_' + lastName + '@teacher.hstu.ac.bd';

                // Set the Teacher ID input value
                teacherIDInput.value = teacherID;
            } else {
                // If there are not enough name parts, clear the Teacher ID input
                teacherIDInput.value = '';
            }
        }

        // Attach an event listener to the Full Name input to update the Teacher ID
        var fullNameInput = document.getElementById('name');
        fullNameInput.addEventListener('input', updateTeacherID);
    </script>
@endsection
