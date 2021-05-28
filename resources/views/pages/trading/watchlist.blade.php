@extends('main')

@section('title', 'Offers')

@section('content')
    <h1>Watchlist</h1>

    <div class="container">
        <div class="row">
            @foreach($offerArray as $offer)
                <div class="col-lg-6" style="padding: 15px;">
                    <x-offer-card :offer="$offer">
                        <p class="card-text">Offered By: <span class="font-weight-bold">{{$offer->user}}</span></p>
                        <button class="btn btn-sm btn-primary">Contact</button>
                    </x-offer-card>
                </div>
            @endforeach
        </div>
    </div>
@endsection
