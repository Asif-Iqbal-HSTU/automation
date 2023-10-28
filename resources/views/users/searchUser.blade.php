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
                        <a class="nav-link" href="{{ route('logout') }}"><i
                                class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
            <h4 class="text-center">Search Users</h4>
            <h3 class="text-center">You can search any users and Edit there credentials from here</h3>
            <br>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('searchUser') }}" method="POST">
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

            <div class="row">
                <div class="col-lg-4">
                    <label for="Phone No." class="form-label">Enter UID to search:</label>
                    <input type="text" class="form-control" id="uid" placeholder="Enter UID" name="uid">
                </div>
            </div>
            </br>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
@endsection
