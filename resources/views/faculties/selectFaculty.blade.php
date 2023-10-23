@extends('master')

@section('titleContent')
    <title>Select Faculty Page</title>
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
    {{-- <form action="{{ route('faculty') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <label for="Faculty" class="form-label">Faculty</label>
                <select name="faculty" class="form-select" aria-label="Default select example">
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Proceed</button>
    </form> --}}
    {{-- <div>Faculties in HSTU</div>
    <div>
        @foreach ($faculties as $faculty)
            <a href="{{ route('faculty2', ['facultyID' => $faculty->id]) }}">{{ $faculty->name }}</a> <br>
        @endforeach
    </div> --}}
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
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Faculties in HSTU</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($faculties as $faculty)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <a
                                                href="{{ route('faculty2', ['facultyID' => $faculty->id]) }}">{{ $faculty->name }}</a>
                                            <br>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <?php
                        $r = session()->get('user_role');
                        ?>
                        <?php if ($r === "superAdmin"): ?>
                        <a href="{{route('addFacultyPage')}}" class="btn btn-primary">Add Faculty</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
