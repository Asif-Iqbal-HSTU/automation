@extends('master')

@section('titleContent')
    <title>Teacher Profile Page</title>
    <style>
        .image-cropper {
            width: 150px;
            /* Adjust the width and height as needed */
            height: 150px;
            overflow: hidden;
            display: flex;
            border-radius: 50%;
            margin: 0 auto;
        }

        .image-cropper img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 50%;
        }

        body {
            background-color: #FAFAFA;
        }

        .card-centered {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .card-img-top {
            width: 150px;
            /* Adjust the desired width */
            height: 150px;
            /* Adjust the desired height */
            object-fit: cover;
            border-radius: 0%;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">HSTU Automation Program</a>

                <!-- Navbar links -->
                <ul class="navbar-nav ml-auto flex-row">
                    {{-- <li class="nav-item mr-2">
                    <a class="nav-link" href="#"><i class="fa-solid fa-house-user fa-lg"></i>Home</a>
                </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i
                                class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">Upload Enrollment Details</h4>
            <h3 class="text-center">Enrollment details can be uploaded from here</h3>
            <br>
        </div>
    </div>
    <div class="container">
        <form action="{{route('createEnrollment')}}" method="POST">
            @csrf
            @if (\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </div>
            @endif

            @if (\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">
                    {{ \Illuminate\Support\Facades\Session::get('success') }}
                </div>
            @endif
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="searchSelect" class="form-label">Degree</label>
                    <select name="degree" id="degree" class="form-select" aria-label="Default select example">
                        @foreach ($degrees as $degree)
                            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class="col-lg-4">
                    <label for="Current Level" class="form-label">Level</label>
                    <select class="form-select" aria-label=".form-select-lg example" name="level" id="level">
                        <option selected>Open this select menu</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div><br>
                <div class="col-lg-4">
                    <label for="Current Semester" class="form-label">Semester</label>
                    <select class="form-select" aria-label="Default select example" name="semester" id="semester">
                        <option selected>Open this select menu</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                    </select>
                </div><br>
            </div><br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="credit" class="form-label">Total Credit Hour</label>
                    <input type="number" class="form-control" id="totalCreditHour" name="totalCreditHour" placeholder="Enter Total Credit Hour">
                </div>
                <div class="col-lg-4">
                    <label for="credit" class="form-label">Credit Hour Fee</label>
                    <input type="number" class="form-control" id="creditHourFee" name="creditHourFee" placeholder="Enter Credit Hour Fee">
                </div>
                <div class="col-lg-4">
                    <label for="credit" class="form-label">Other Fees</label>
                    <input type="number" class="form-control" id="otherFees" name="otherFees" placeholder="Enter Other Fees">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="col-lg-6">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date">
                </div>
                <div class="col-lg-4">
                    <label for="notice" class="form-label">Notice</label>
                    <input type="text" class="form-control" id="notice" name="notice" placeholder="Notice (auto generated)">
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Create an Enrollment</button>
        </form>
    </div>

    <script>
        // Get references to the select elements and the notice input field
        var degreeSelect = document.getElementById('degree');
        var levelSelect = document.getElementById('level');
        var semesterSelect = document.getElementById('semester');
        var startDateInput = document.getElementById('start_date');
        var endDateInput = document.getElementById('end_date');
        var noticeInput = document.getElementById('notice');

        // Add event listeners to trigger notice generation
        degreeSelect.addEventListener('change', generateNotice);
        levelSelect.addEventListener('change', generateNotice);
        semesterSelect.addEventListener('change', generateNotice);
        startDateInput.addEventListener('change', generateNotice);
        endDateInput.addEventListener('change', generateNotice);

        // Function to generate the notice
        function generateNotice() {
            var degree = degreeSelect.options[degreeSelect.selectedIndex].text;
            var level = levelSelect.options[levelSelect.selectedIndex].text;
            var semester = semesterSelect.options[semesterSelect.selectedIndex].text;
            var startDate = startDateInput.value;
            var endDate = endDateInput.value;

            var notice = `Enrollment for ${degree}, level ${level}, and semester ${semester} is open from ${startDate} to ${endDate}.`;

            noticeInput.value = notice;
        }
    </script>

@endsection
