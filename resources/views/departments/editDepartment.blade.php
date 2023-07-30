@extends('master')

@section('titleContent')
    <title>Edit Department Info</title>
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
    <div class="container text-start">
        <br>
        <h3>Department Info Edit Form</h3>
        <hr>
        <form action="{{ route('updateDepartment', ['deptID' => $department->id]) }}" method="POST">
            @csrf
            @method('PUT')
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
                    <label for="name" class="form-label">Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Department Name" value="{{ $department->name }}">
                </div>
                <div class="col-lg-4">
                    <label for="Chairman" class="form-label">Chairman</label>
                    <select name="chairman" id="chairman" class="form-select" aria-label="Default select example">
                        @foreach ($teachers as $teacher)
                            @if ($teacher->department == $department -> id)
                                <option value="{{ $teacher->id }}" {{ $teacher->id == $department -> chairman ? 'selected' : '' }}>
                                        <?php
                                        $user = \App\Models\User::where('uid',$teacher->tid)->first();
                                        ?>
                                    <a href="#">{{ $user->name }}</a>
                                </option>
                            @endif
                            {{--<option value="{{ $faculty->id }}" {{ $faculty->id == $student->faculty ? 'selected' : '' }}>{{ $faculty->name }}</option>
                            @if ($teacher->id == $department -> chairman)
                                    <?php
                                    $user = \App\Models\User::where('uid',$teacher->tid)->first();
                                    ?>
                                <a href="#">{{ $user->name }}</a>
                            @endif--}}
                        @endforeach
                        {{--@foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}" {{ $faculty->id == $student->faculty ? 'selected' : '' }}>{{ $faculty->name }}</option>
                        @endforeach--}}
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="Faculty" class="form-label">Faculty</label>
                    <select name="faculty" id="faculty" class="form-select" aria-label="Default select example">
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}" {{ $faculty->id == $department->faculty ? 'selected' : '' }}>{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="chairmanMessage" class="form-label">Chairman Message</label>
                    <textarea class="form-control" id="chairmanMessage" name="chairmanMessage" rows="3" value="{{ $department->chairmanMessage }}">{{ $department->chairmanMessage }}</textarea>
                    {{--<input type="text" class="form-control" id="name" name="name" placeholder="Enter Department Name" value="{{ $department->name }}">--}}
                </div>
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Update Department Info</button>
        </form>
    </div>
@endsection
