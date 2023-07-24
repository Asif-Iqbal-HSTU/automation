@extends('master')

@section('titleContent')
    <title>HSTU</title>
    <style>
        body {
            background-image: url("hstu.jpg");
            /* Replace with the path to your university background image */
            background-size: cover;
            background-position: center;
        }
    </style>
@endsection

@section('content')
    <div
        class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100 col-md-8 offset-md-2">
        <div class="card col-md-4 mt-3">
            <div class="card-body">
                <div class="text-center">
                    <h3>Change Password</h3>
                </div>
                <form class="mt-3" action="{{ route('updatePassword', ['uid' => $user->uid]) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="text" class="form-control" id="currentPassword" name="currentPassword" placeholder="Enter Current Password">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Enter New Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
        </div>
    </div>

    <!--
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="{{ route('loginUser') }}" method="post">
                            @csrf
                            @if (\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger">
                                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                                </div>
    @endif
                            <div class="form-group">
                                <label for="">UID</label>
                                <input type="text" class="form-control" id="uid" name="uid" placeholder="Enter UID">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div> -->
@endsection
