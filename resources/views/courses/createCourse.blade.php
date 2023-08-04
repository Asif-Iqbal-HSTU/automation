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
                <h4 class="text-center">Create Course for</h4>
                <h3 class="text-center">{{ $degree->name }}</h3>
                <br>
            </div>
        </div>
        <hr>
        <form action="{{ route('createCourse', ['degreeID' => $degree->id]) }}" method="POST">
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
                    <label for="code" class="form-label">Course Code</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Course Code">
                </div>
                <div class="col-lg-4">
                    <label for="name" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Course Name">
                </div>
                <div class="col-lg-4">
                    <label for="credit" class="form-label">Credit</label>
                    <input type="text" class="form-control" id="credit" name="credit" placeholder="Enter Course Credit">
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <label for="type" class="form-label">Course Type</label>
                    <select name="type" id="type" class="form-select" aria-label="Default select example">
                        <option value="">--Select a type--</option>
                        <option value="Theory">Theory</option>
                        <option value="Sessional">Sessional</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="level" class="form-label">Level</label>
                    <select name="level" id="level" class="form-select" aria-label="Default select example">
                        <option value="">--Select a level--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="semester" class="form-label">Level</label>
                    <select name="semester" id="semester" class="form-select" aria-label="Default select example">
                        <option value="">--Select a semester--</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                    </select>
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection
