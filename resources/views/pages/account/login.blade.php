@extends('main')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    <p>
        <form method="post" action="/login">
        @csrf
            <div class="form-group">
                <label for="usernameID">Username:</label>
                <input type="text" class="form-control" id="usernameID" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="passwordID">Password:</label>
                <input type="password" class="form-control" id="passwordID" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </p>

    <p>{{session("err")}}</p>

@endsection
