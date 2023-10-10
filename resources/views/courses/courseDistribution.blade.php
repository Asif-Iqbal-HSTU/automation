<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searchable Dropdown with Select2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
</head>

<body>
    <div class="container">
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
                <h4 class="text-center">Course Distribution</h4>
                <h3 class="text-center">Distribute course to a teacher from here</h3>
                <br>
            </div>
        </div>
        <div>

            <form action="{{ route('addCourseDistribution') }}" method="POST">
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
                        <select class="form-select" aria-label=".form-select-lg example" name="level">
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
                        <select class="form-select" aria-label="Default select example" name="semester">
                            <option selected>Open this select menu</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                        </select>
                    </div><br>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="Section" class="form-label">Section</label>
                        <select class="form-select" aria-label="Default select example" name="section">
                            <option selected>Open this select menu</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div><br>
                    <div class="col-lg-4">
                        <label for="Session" class="form-label">Session</label>
                        <input type="text" class="form-control" id="session" placeholder="Enter Session"
                            name="session">
                    </div><br>
                    <div class="col-lg-4">
                        <label for="Section" class="form-label">Academic Year</label>
                        <input type="text" class="form-control" id="academicYear" placeholder="Enter Academic Year"
                            name="academicYear">
                    </div><br>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <label for="searchSelect" class="form-label">Select Course:</label>
                        <select class="form-control" id="code" name="code">
                            <!-- Your dropdown options go here -->
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="col-lg-4">
                        <label for="searchSelect" class="form-label">Select Teacher:</label>
                        <select class="form-control" id="teacher" name="teacher">
                            <!-- Your dropdown options go here -->
                            @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">
                                        <?php
                                        $user = \App\Models\User::where('uid', $teacher->tid)->first();
                                        ?>
                                        <a href="#">{{ $user->name }}</a>
                                    </option>
                            @endforeach
                        </select>
                    </div><br>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Create a Distribution</button>
            </form>
        </div>

        <script>
            $(document).ready(function() {
                $('#code').select2();
            });
            $(document).ready(function() {
                $('#teacher').select2();
            });
        </script>

</body>

</html>
