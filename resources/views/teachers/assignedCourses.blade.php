@extends('master')
@section('content')

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
                    <h4 class="text-center">Distributed Courses</h4>
                    <h3 class="text-center">Courses assigned to you is shown here</h3>
                    <br>
                </div>
            </div>
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-6 offset-md-3">
                        <div class="card w-200">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Course Code</th>
                                            <th scope="col">Course Name</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">Academic Year</th>
                                            <th scope="col">Level</th>
                                            <th scope="col">Semester</th>
                                            <th scope="col">Section</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <?php
                                            $c = \App\Models\Course::where('id', $course->code)->first();
                                            ?>
                                            <tr>
                                                <td><a href="{{ route('coursePage', ['courseID' => $c->id]) }}">{{ $c->code }}</a>
                                                    <br>
                                                </td>
                                                <td><a href="{{ route('coursePage', ['courseID' => $c->id]) }}">{{ $c->name }}</a>
                                                    <br>
                                                </td>
                                                <td>{{ $course->session }}
                                                    <br>
                                                </td>
                                                <td>{{ $course->academicYear }}
                                                    <br>
                                                </td>
                                                <td>{{ $course->level }}
                                                    <br>
                                                </td>
                                                <td>{{ $course->semester }}
                                                    <br>
                                                </td>
                                                <td>{{ $course->section }}
                                                    <br>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
@endsection
