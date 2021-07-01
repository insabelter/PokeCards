@extends('main')

@section('title', 'Watchlist')

@section('content')
    <h1>Watchlist</h1>

    <div class="container">
        <div class="row">
            @foreach($offerArray as $offer)
                <div class="col-lg-6" style="padding: 15px;">
                    <x-offer-card :offer="$offer">
                        <p class="card-text">Offered By: <span class="font-weight-bold">{{$offer->user}}</span></p>

                        <div class="container">
                            <div class="row">
                                <form method="post" action="/marketplace/watch">
                                    @csrf
                                    <input hidden type="text" name="offerId" value="{{$offer->id}}">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                                        </svg>
                                    </button>
                                    <button class="btn btn-sm btn-primary" style="margin-left: 5px;">Contact</button>
                                </form>
                            </div>
                        </div>

                    </x-offer-card>
                </div>
            @endforeach
        </div>
    </div>
@endsection
