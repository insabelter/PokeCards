@extends('main')

@section('title', 'Login')

@section('content')
    <h1>Login successful</h1>
    <p>
        Welcome {{ Auth::user()->name }}!
    </p>


@endsection
