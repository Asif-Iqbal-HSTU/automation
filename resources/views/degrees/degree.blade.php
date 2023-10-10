@extends('master')

@section('titleContent')
    <title>Department Page</title>
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
    {{--<div>{{ $department -> name }}</div>
    <div>{{ $department -> chairman }}</div>--}}
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
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <h4 class="text-center">Welcome to </h4>
                <h3 class="text-center">{{ $degree -> name }}</h3>
                <br>
                <div class="card w-150">
                    {{--<div class="card-header">
                        <h4 class="">Honorable Chairman:</h4>
                        @foreach ($teachers as $teacher)
                            @if ($teacher->id == $department -> chairman)
                                    <?php
                                    $user = \App\Models\User::where('uid',$teacher->tid)->first();
                                    ?>
                                <a href="#">{{ $user->name }}</a>
                            @endif
                        @endforeach
                        <p>{{ $faculty -> dean }}</p>
                    </div>
                    <div class="card-header">
                        <h4 class="">Message from Chairman:</h4>
                        <p>{{ $department -> chairmanMessage }}</p>
                    </div>--}}
                    <div class="card-header">
                        <h4>Courses of Different Levels & Semesters:</h4>
                    </div>

                    {{--L1S1--}}
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Level 1, Semester I
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Course Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($courses as $course)
                                    @if ($course->degree == $degree -> id)
                                        @if($course->level == "1" && $course->semester == "I")
                                        <tr>
                                            <td><a href="{{ route('coursePage', ['courseID' => $course->id]) }}">{{ $course->code }}</a> <br></td>
                                            <td><a href="{{ route('coursePage', ['courseID' => $course->id]) }}">{{ $course->name }}</a> <br></td>
                                        </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--L1S2--}}
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Level 1, Semester II
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">Course Code</th>
                                    <th scope="col">Course Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($courses as $course)
                                    @if ($course->degree == $degree -> id)
                                        @if($course->level == "1" && $course->semester == "II")
                                            <tr>
                                                <td><a href="{{ route('coursePage', ['courseID' => $course->id]) }}">{{ $course->code }}</a> <br></td>
                                                <td><a href="{{ route('coursePage', ['courseID' => $course->id]) }}">{{ $course->name }}</a> <br></td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--<div class="card-body">
                        <h4>Our Courses:</h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Course Code</th>
                                <th scope="col">Course Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $course)
                                @if ($course->degree == $degree -> id)
                                    <tr>
                                        <td><a href="#">{{ $course->code }}</a> <br></td>
                                        <td><a href="#">{{ $course->name }}</a> <br></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <ul class="list-group list-group-flush">
                            @foreach ($courses as $course)
                                @if ($course->degree == $degree -> id)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <a href="#">{{ $course->name }}</a> <br>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>--}}
                    {{--<div class="card-footer">
                        <h4 class="">Department Notice:</h4>
                        <p>This is a notice</p>
                    </div>--}}
                    <div class="card-footer">
                        <?php
                        $r = session()->get('user_role');
                        ?>
                        <?php if ($r === "superAdmin"): ?>
                        <form action="{{ route('createCoursePage', ['degreeID' => $degree->id]) }}" method="GET">
                            @csrf
                            <button type="submit" {{ $r == 'student' ? 'disabled' : '' }}
                            class="btn btn-danger float-right">Create Course</button>
                        </form>

                        {{--<form action="{{ route('editDepartment', ['deptID' => $department->id]) }}" method="GET">
                            @csrf
                            <button type="submit" {{ $r == 'student' ? 'disabled' : '' }}
                            class="btn btn-danger float-right">Edit Department Info</button>
                        </form>--}}
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
