@extends('main')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>

    <button type="button" class="btn btn-primary">Edit Information</button>
    <form method="post" action="/profile">
        @csrf
        <div class="form-group">
            <label for="usernameID">Username:</label>
            <input type="text" class="form-control" id="usernameID" name="username" value="User" readonly>
        </div>
        <div class="form-group">
            <label for="passwordID">Password:</label>
            <input type="password" class="form-control" id="passwordID" name="password" value="Password" readonly>
        </div>
        <div class="form-group">
            <label for="emailID">E-Mail:</label>
            <input type="email" class="form-control" id="emailID" name="email" value="test@mail.com" readonly>
        </div>
        <div class="form-group">
            <label for="telefonID">Telefon:</label>
            <input type="text" class="form-control" id="telefonID" name="telefon" value="+01 23456789" readonly>
        </div>
        <button type="submit" class="btn btn-primary" disabled>Update Information</button>
    </form>
@endsection
