@extends('main')

@section('title', 'Offers')

@section('content')
    <h1>Your Offers</h1>

    <p>
        <h2>Create new Offer</h2>

        <form method="post" action="/offers">
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

        <p>{{session("msg")}}</p>
    </p>

    <p>
        <h2>Your previous Offers</h2>

        <div class="container">
            <div class="row">
                @foreach($offerArray as $offer)
                    <div class="col-lg-6" style="padding: 15px;">
                        <x-offer-card :offer="$offer"/>
                    </div>
                @endforeach
            </div>
        </div>
    </p>
@endsection
