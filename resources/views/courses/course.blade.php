@extends('master')

@section('titleContent')
    <title>Student Profile Page</title>
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
                    {{--<li class="nav-item mr-2">
                        <a class="nav-link" href="#"><i class="fa-solid fa-house-user fa-lg"></i>Home</a>
                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <h4 class="text-center">{{ $course->code }}</h4>
                <h3 class="text-center">{{ $course->name }}</h3>
                <br>
                <div class="card w-150">
                    <div class="card-body">
                        <p><strong>Type:</strong> {{ $course->type }}</p>
                        <p><strong>Credit:</strong> {{ $course->credit }}</p>
                        <p><strong>Level:</strong> {{ $course->level }}</p>
                        <p><strong>Semester:</strong> {{ $course->semester }}</p>
                        <p><strong>Degree:</strong>
                            @foreach ($degrees as $degree)
                                @if ($degree -> id == $course->degree)
                                    <a href="{{ route('degree', ['degreeID' => $degree->id]) }}">{{ $degree->name }}</a>
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer">
                        <?php
                        $r = session()->get('user_role');
                        ?>
                        <?php if ($r === "student"): ?>
                        {{--<a href="{{ route('courseCurriculumPage', ['courseID' => $course->id]) }}">See Course Curriculum</a>--}}
                        <a href="#">See Course Curriculum</a>
                        <?php endif; ?>
                        <?php if ($r === "teacher" || $r === "superAdmin"): ?>
                        <a href="#">Edit Course Curriculum</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
