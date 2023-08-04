@extends('master')

@section('titleContent')
    <title>Super Admin Dashboard Page</title>
    <style>
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
    <?php
    $user = \App\Models\User::find(session()->get('loginUser'))->first();
    ?>
    @if ($user)
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Super Admin Profile</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <!-- Basic Information -->
                                    <h5>Basic Information</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>ID:</strong> {{ $user->uid }}</p>
                                            <p><strong>Name:</strong> {{ $user->name }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <!-- Contact Information -->
                                    <h5>Contact Information</h5>
                                    <p><strong>Phone:</strong> {{ $user->mobile }}</p>
                                    <p><strong>Email:</strong> {{ $user->email }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('editPassword', ['uid' => $user->uid]) }}" class="btn btn-primary">Change Password</a>
                            <a href="{{ route('logout') }}" class="btn btn-danger float-right">Logout</a>
                            <?php
                            $r = session()->get('user_role');
                            ?><br><br>
                            <?php if ($r === "superAdmin"): ?>
                            <form action="{{ route('editUser', ['uid' => $user->uid]) }}" method="GET">
                                @csrf
                                <button type="submit" {{ $r == 'student' ? 'disabled' : '' }}
                                    class="btn btn-danger float-right">Edit</button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @else
        <p>No record found for the provided UID.</p>
    @endif

    <div class="container">
        <div class="card-deck mt-4 mb-4">
            <div class="card card-centered">
                <img src="student.gif" class="card-img-top" alt="Card Image 1">
                <div class="card-body">
                    <h5 class="card-title">Add Student</h5>
                    <p class="card-text">As an admin, You can add students</p>
                    <a href="{{ route('addStudentPage') }}" class="btn btn-primary">Go to Add Student</a>
                </div>
            </div>
            <div class="card card-centered">
                <img src="teacher.gif" class="card-img-top" alt="Card Image 2">
                <div class="card-body">
                    <h5 class="card-title">Add Teacher</h5>
                    <p class="card-text">As an admin, You can add teachers</p>
                    <a href="{{ route('addTeacherPage') }}" class="btn btn-primary">Go to Add Teacher</a>
                </div>
            </div>
            <div class="card card-centered">
                <img src="addUser.gif" class="card-img-top" alt="Card Image 3">
                <div class="card-body">
                    <h5 class="card-title">Search User</h5>
                    <p class="card-text">You can search for Users to edit their information</p>
                    <a href="{{ route('gotoSearchUser') }}" class="btn btn-primary">Go to Search User</a>
                </div>
            </div>
        </div>
        <div class="card-deck mt-4 mb-4">
            <div class="card card-centered">
                <img src="addUser.gif" class="card-img-top" alt="Card Image 3">
                <div class="card-body">
                    <h5 class="card-title">Faculties & Departments</h5>
                    <p class="card-text">Find and edit Faculties here. It is easy to update from here</p>
                    <a href="{{ route('selectFaculty') }}" class="btn btn-primary">Go to Faculties</a>
                </div>
            </div>
            <div class="card card-centered">
                <img src="addUser.gif" class="card-img-top" alt="Card Image 3">
                <div class="card-body">
                    <h5 class="card-title">Courses</h5>
                    <p class="card-text">Create Courses, Course Distributions, edit curriculum from here</p>
                    <a href="{{ route('gotoSearchUser') }}" class="btn btn-primary">Go to Courses</a>
                </div>
            </div>
        </div>
    </div>

    <!--<?php
    $user = \App\Models\User::find(session()->get('loginUser'))->first();
    $u_id = $user->id;
    $email = $user->email;
    $r = session()->get('user_role');
    ?>
        <h1>Welcome to the Super Admin Dashboard Page {{ $r }}</h1>
        <p>This is the content of the Super Admin Dashboard page.</p>
        <p>UID: {{ $u_id }}</p>
        <p>Email: {{ $email }}</p>
        <a href="{{ route('addStudentPage') }}" class="btn btn-primary">Add Student</a>
        <a href="{{ route('addTeacherPage') }}" class="btn btn-primary">Add Teacher</a>
        <a href="{{ route('gotoSearch') }}" class="btn btn-primary">Search Model</a>
        <a href="{{ route('gotoSearchUser') }}" class="btn btn-primary">Search User</a>-->
@endsection
