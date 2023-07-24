@extends('master')

@section('titleContent')
    <title>Super Admin Dashboard Page</title>
@endsection

@section('content')
    <?php
    $user = \App\Models\User::find(session()->get('loginUser'))->first();
    $u_id = $user->id;
    $email = $user->email;
    ?>
    <h1>Welcome to the Super Admin Dashboard Page</h1>
    <p>This is the content of the Super Admin Dashboard page.</p>
    <p>UID: {{ $u_id }}</p>
    <p>Email: {{ $email }}</p>
    <a href="{{ route('addStudentPage') }}" class="btn btn-primary">Add Student</a>
    <a href="{{ route('addTeacherPage') }}" class="btn btn-primary">Add Teacher</a>
    <a href="{{ route('gotoSearch') }}" class="btn btn-primary">Search Model</a>
    <a href="{{ route('gotoSearchUser') }}" class="btn btn-primary">Search User</a>

@endsection
