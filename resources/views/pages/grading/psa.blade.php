@extends('main')

@section('title', 'Calculator PSA')

@section('content')
    <h1>Calculator PSA</h1>

    <h2>Welcome to the cost calculator for PSA.</h2>


    <div class="form-group">
        <label for="passwordID">cards valued </label>
        <input type="password" class="form-control" id="passwordID" name="password" value="Password">
    </div>
    <div class="form-group">
        <label for="email">E-Mail:</label>
        <input type="email" class="form-control" id="email" name="email" value={{ Auth::user()->email }}>
    </div>

    <button type="submit" class="btn btn-primary">Calculate</button>




@endsection
