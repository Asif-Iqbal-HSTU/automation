@extends('master')

@section('titleContent')
    <title>Add Student Page</title>
@endsection

@section('content')
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
        <input type="text" name="uid" placeholder="Enter UID">
        <button type="submit">Search</button>
    </form>
@endsection
