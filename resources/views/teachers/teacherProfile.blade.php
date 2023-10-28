@extends('master')

@section('titleContent')
    <title>Teacher Profile Page</title>
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
            border-radius: 0%;
        }
    </style>
@endsection

<!--@section('titleContent')
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
@endsection-->

@section('content')
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
                        <a class="nav-link" href="{{ route('teacherNotices', ['uid' => $user->uid]) }}"><i
                                class="fas fa-bell fa-lg"></i>Notices</a>
                    </li>
                    &nbsp; &nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i
                                class="fa-solid fa-arrow-right-from-bracket fa-lg"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @if ($user)
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8 offset-md-2">

                    <div class="image-cropper mb-2">
                        <img src="https://lh3.googleusercontent.com/pw/AJFCJaXJNhrFbnPLiBzqjic_BsBpwb-_PRQUBn4ixCKumDZotJ0QEuzA3YPhX-lAuSDk4RoxJYyy_-RD6QZ2yVVRnwr63PaoPUbtHGSV4TfRueTVoddhX-gAFIP4lCVUMkxhHp62Ia4Z16MSGd1NFRpTLRCamOz-ydgyT6K0-YCtjOuApDkM4axdc7yVHNkeRaqwgeUsj-_wVmAa2OjyRAsXRdkfIyhMGNtWmUtyWy9qquZrE5hmQg679Y75NN8SCzFXt1fyCIKvKymu5HZyZswFfw-T_tWfh0rpoK2fMFYT5bGp7HY9Z8bpPjEkweP5rTN9Gt-UfuumdDXHuisbpmBgd8DTZ4xVDVtpBnGf3w8mJOVmiCXVo-KoBvD8VQcoQZyf-vDEXiVDkHblT6DRdlLKr4j7s8SvVwYNjx557DxHMUxQaRhKe_laTUE608Ks-EbAG9Z_W8xH2KC0uhWUPsNXB0jPaomCfoThHdHlaXDxCet99dLWJ0jh217QCSAoSMaOVAWA8ACNyjMuhIA97mr3FN795gQWxktnl_dT3P5L4tJRTmgxKAq1eJp9EdhGfMBv2W-YEd8pHWAm64LT1fg-wovptGmDwLUoQQLOUFiJpYnBXYjBMl86BpG0Nib4zTJn6-iH0FEjxWfR16aoMLWDuoQUOzLBetq-D4AdetJap3zdIVVodsxum0e5rR8c1eOjJUtZOpyMaJerp_ajSeIq5ehuz9P6ZsC1gMjj_on3nELfEScakWRcdUFU1MX0HPSTMwnZFpdgC3Bo3FO20qzHVDO8JUcy4oZN1N7qkWyQ0rHDmF7ZTYDA0Sa_eRykOHKc1amYT-CBTNkfFJXBcs6L-aEep2_v7o0naCvWh4Vu4PYMTserVUeGQSHSbbAnvEFGor1rRBfFaVqngTYvzhSGe78W_A=w656-h492-s-no?authuser=0"
                            class="img-fluid rounded-circle">
                    </div>
                    <div class="card mb-2">
                        <div class="card-header">
                            <h3 class="text-center">Teacher Profile</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p><strong>ID:</strong> {{ $user->uid }}</p>
                                            <p><strong>Name:</strong> {{ $user->name }}</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    See Details
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <!-- Basic Information -->
                                        <h5>Basic Information</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p><strong>Department:</strong>
                                                    @foreach ($departments as $department)
                                                        @if ($department->id == $teacher->department)
                                                            {{ $department->name }}
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p><strong>Faculty:</strong>
                                                    @foreach ($faculties as $faculty)
                                                        @if ($faculty->id == $teacher->faculty)
                                                            {{ $faculty->name }}
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p><strong>Designation:</strong> {{ $teacher->designation }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <!-- Contact Information -->
                                        <h5>Contact Information</h5>
                                        <p><strong>Phone:</strong> {{ $user->mobile }}</p>
                                        <p><strong>Email:</strong> {{ $user->email }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <!-- Address Information -->
                                        <h5>Address</h5>
                                        <p><strong>Village:</strong> {{ $address->village }}</p>
                                        <p><strong>Union:</strong> {{ $address->union }}</p>
                                        <p><strong>Upazilla:</strong> {{ $address->upazilla }}</p>
                                        <p><strong>District:</strong> {{ $address->district }}</p>
                                        <p><strong>Division:</strong> {{ $address->division }}</p>
                                        <p><strong>Post Code:</strong> {{ $address->postCode }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="card-footer">
                            <?php
                            $r = session()->get('user_role');
                            ?>
                            <?php if ($r === "teacher"): ?>
                            <a href="{{ route('editPassword', ['uid' => $user->uid]) }}" class="btn btn-primary">Change
                                Password</a>

                            <a href="{{ route('editStudentSpecifics', ['uid' => $user->uid]) }}"
                                class="btn btn-primary">Edit Profile</a>
                            <a href="{{ route('logout') }}" class="btn btn-danger float-right">Logout</a>
                            <?php endif; ?>
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



        <!--<h1>{{ $user->role }} Profile</h1>
                                        <p>UID: {{ $user->uid }}</p>
                                        <p>Name: {{ $user->name }}</p>
                                        <p>District: {{ $address->district }}</p>
                                        <p>Division: {{ $address->division }}</p>
                                        <p>Designation: {{ $teacher->designation }}</p>
                                        <?php
                                        $r = session()->get('user_role');
                                        ?>
                                        <?php if ($r === "superAdmin"): ?>
                                        <form action="{{ route('editUser', ['uid' => $user->uid]) }}" method="GET">
                                            @csrf
                                            <button type="submit" {{ $r == 'student' ? 'disabled' : '' }}>Edit</button>
                                        </form>
                                        <?php endif; ?>-->
    @else
        <p>No record found for the provided UID.</p>
    @endif

    <div class="container">
        <div class="card-deck mt-4 mb-4">
            <div class="card card-centered">
                <img src="instructor.png" class="card-img-top" alt="Card Image 1">
                <div class="card-body">
                    <h5 class="card-title">Your Courses</h5>
                    <p class="card-text">Inspect assigned courses from here</p>
                    <a href="{{ route('teacherCourses', ['uid' => $teacher->id]) }}" class="btn btn-primary">Courses</a>

                </div>
            </div>
            @foreach ($departments as $department)
                @if ($department->id == $teacher->department)
                    @if ($department->chairman == $teacher->id)
                        <div class="card card-centered">
                            <img src="addUser.gif" class="card-img-top" alt="Card Image 3">
                            <div class="card-body">
                                <h5 class="card-title">Course Distributions</h5>
                                <p class="card-text">Distribute courses to teachers from here</p>
                                <a href="{{ route('courseDistributionPage') }}" class="btn btn-primary">Go to Courses</a>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
            @foreach ($faculties as $faculty)
                @if ($faculty->id == $teacher->faculty)
                    @if ($faculty->dean == $teacher->id)
                        <div class="card card-centered">
                            <img src="addUser.gif" class="card-img-top" alt="Card Image 3">
                            <div class="card-body">
                                <h5 class="card-title">Enrollment</h5>
                                <p class="card-text">Update enrollment details</p>
                                <a href="{{ route('uploadEnrollmentPage') }}" class="btn btn-primary">Go to Enrollment</a>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>

    </div>

@endsection
