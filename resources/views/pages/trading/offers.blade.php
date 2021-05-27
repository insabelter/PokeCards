@extends('main')

@section('title', 'Offers')

@section('content')
    <h1>Your Offers</h1>

    <div>
        <h2>Create new Offer</h2>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="/offers">
                        @csrf
                        <div class="form-group">
                            <label for="cardnameID">Card Name:</label>
                            <input type="text" class="form-control" id="cardnameID" name="cardname" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="setID">Set:</label>
                            <input type="text" class="form-control" id="setID" name="set" placeholder="Set">
                        </div>
                        <div class="form-group">
                            <label for="priceID">Price:</label>
                            <input type="text" class="form-control" id="priceID" name="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="imageID">Image URL:</label>
                            <input type="text" class="form-control" id="imageID" name="image" placeholder="Image URL">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                    <p style="margin-top: 10px;">{{session("msg")}}</p>
                </div>
            </div>
        </div>

    </div>

    <div>
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
    </div>
@endsection
