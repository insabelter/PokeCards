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
                                    <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title="remove from watchlist">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                                        </svg>
                                    </button>
                                </form>

                                <button type="button" data-toggle="modal" data-target="#contactModal{{$offer->id}}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="contact the seller" style="margin-left: 5px;">Contact</button>
                                {{-- Modal for Contact Message --}}
                                <div class="modal fade" id="contactModal{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <form method="post" action="/marketplace/contact">
                                                    @csrf
                                                    <input hidden name="offerId" value="{{$offer->id}}">
                                                    <h3>Message to {{$offer->user}}</h3>
                                                    The user will receive your message via e-mail <br>and hopefully respond quickly.<br>
                                                    <div class="form-group" style="margin-top: 10px;">
                                                        <textarea type="text" class="form-control" id="messageID" name="message" placeholder="Message" style="resize: none; height: 150px;"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-primary" style="margin-left: 5px;">Send</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </x-offer-card>
                </div>
            @endforeach
        </div>
    </div>
@endsection
