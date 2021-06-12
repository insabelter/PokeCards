@extends('main_no_navbar')

@section('title', 'Not Found')

@section('content')
    <h1>Ooops ...</h1>
    <br>
    <h3>Looks like this Page does not exist.</h3>

    <p>
        <img src="{{asset('images/SadPikachu.png')}}" alt="Sad Pikachu Image" class="col-12 col-md-6" style="padding: 0; border-radius: 0.25rem;">
    </p>

    <a class="btn btn-primary" href="{{ route('start') }}">Go back to Start</a>

@endsection
