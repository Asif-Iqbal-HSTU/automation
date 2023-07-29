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
            <h4 class="text-center">Welcome to Department of</h4>
            <h3 class="text-center">{{ $department -> name }}</h3>
            <br>
            <div class="card">
                <div class="card-header">
                    <h4 class="">Honorable Chairman:</h4>
                    @foreach ($teachers as $teacher)
                        @if ($teacher->id == $department -> chairman)
                                <?php
                                $user = \App\Models\User::where('uid',$teacher->tid)->first();
                                ?>
                            <a href="#">{{ $user->name }}</a>
                        @endif
                    @endforeach
                    {{--<p>{{ $faculty -> dean }}</p>--}}
                </div>
                <div class="card-header">
                    <h4 class="">Message from Chairman:</h4>
                    <p>{{ $department -> chairmanMessage }}</p>
                </div>
                <div class="card-body">
                    <h4>Courses:</h4>
                    {{--<ul class="list-group list-group-flush">
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
                    </ul>--}}
                </div>
                <div class="card-footer">
                    <h4 class="">Department Notice:</h4>
                    <p>This is a notice</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
