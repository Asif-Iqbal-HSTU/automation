@extends('master')

@section('titleContent')
    <title>Faculty Page</title>
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
{{--<div>{{ $faculty -> id }}</div>
<div>{{ $faculty -> name }}</div>
    <div>
        @foreach ($departments as $department)
            @if ($department->faculty == $faculty -> id)
                <a href="{{ route('department', ['deptID' => $department->id]) }}">{{ $department->name }}</a> <br>
            @endif
        @endforeach
    </div>--}}
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
            <h4 class="text-center">Welcome to Faculty of</h4>
            <h3 class="text-center">{{ $faculty -> name }}</h3>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="">Honorable Dean:</h4>
                    @foreach ($teachers as $teacher)
                        @if ($teacher->id == $faculty->dean)
                                <?php
                                $user = \App\Models\User::where('uid',$teacher->tid)->first();
                                ?>
                            <a href="#">{{ $user->name }}</a>
                        @endif
                    @endforeach
                    {{--<p>{{ $faculty -> dean }}</p>--}}
                </div>
                <div class="card-header">
                    <h4 class="">Dean Message:</h4>
                    <p>{{ $faculty -> deanMessage }}</p>
                </div>
                <div class="card-body">
                    <h4>Departments:</h4>
                    <ul class="list-group list-group-flush">
                        @foreach ($departments as $department)
                            @if ($department->faculty == $faculty -> id)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <a href="{{ route('department', ['deptID' => $department->id]) }}">{{ $department->name }}</a> <br>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <h4>Degrees:</h4>
                    <ul class="list-group list-group-flush">
                        @foreach ($degrees as $degree)
                            @if ($degree->faculty == $faculty -> id)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-10">
                                            {{--<a href="{{ route('department', ['deptID' => $department->id]) }}">{{ $department->name }}</a> <br>--}}
                                            <a href="#">{{ $degree->name }}</a> <br>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <h4 class="">Faculty Notice:</h4>
                    <p>This is a notice</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
