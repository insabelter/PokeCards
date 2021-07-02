@extends('main')

@section('title', 'Marketplace')

@section('content')
    <h1>Marketplace</h1>

    <form name="offer-search" action="" method="get" style="margin: 15px;">
        You can search for a specific card or set by entering the name:
        <div class="col-lg-3 col-md-6" style="padding: 0; margin-top: 10px;">
            <div class="input-group">
                <input type="text" name="cardName" id="cardName" class="form-control" placeholder="Card Name" value="{{$cardName}}">
                <input type="text" name="cardSet" id="cardSet" class="form-control" placeholder="Card Set" value="{{$cardSet}}">
                <div class="input-group-append">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </form>

    <div class="container">
        <div class="row">
            @foreach($offerArray as $offer)
                @if((!isset($_GET['cardName']) && !isset($_GET['cardSet'])) || (str_contains(strtolower($offer->name),strtolower($_GET['cardName'])) && str_contains(strtolower($offer->set),strtolower($_GET['cardSet']))))
                <div class="col-lg-6" style="padding: 15px;">
                    <x-offer-card :offer="$offer">
                        <p class="card-text">Offered By: <span class="font-weight-bold">{{$offer->user}}</span></p>

                        @if(Auth::id() !== null && $offer->userId != Auth::id())
                        <div class="container">
                            <div class="row">

                                <form method="post" action="/marketplace/watch">
                                    @csrf
                                    <input hidden type="text" name="offerId" value="{{$offer->id}}">
                                    @if(!$offer->watched)
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                                            </svg>
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"></path>
                                            </svg>
                                        </button>
                                    @endif
                                </form>

                                <button type="button" data-toggle="modal" data-target="#contactModal{{$offer->id}}" class="btn btn-sm btn-primary" style="margin-left: 5px;">Contact</button>
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
                        @endif

                    </x-offer-card>
                </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
