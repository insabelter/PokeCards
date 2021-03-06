@extends('main')

@section('title', 'Offers')

@section('content')
    <h1>Your Offers</h1>

    <div>
        <h2>Create new Offer</h2>

        @if(!auth()->user()->hasVerifiedEmail())
            You need to verify your Account before you can create Offers!<br>
            <form action="{{route('verficationMail')}}" method="get" style="margin: 15px 0;">
                <button type="submit" class="btn btn-primary" style="display: inline-block;">Verify my account</button>
            </form>
        @else
            @if($cardId === 'x')
                Choose a card to create a offer on either the card search or the set explorer:<br>
                <div style="margin: 10px 0;">
                    <a class="btn btn-primary btn-small" style="margin-right: 15px;" href="{{ route('card-search') }}">Card Search</a>
                    <a class="btn btn-primary btn-small" href="{{ route('set-explorer-sets','x') }}">Set Explorer</a>
                </div>
            @else
                <div class="container">
                    <div class="row">
                        {{--                        Image only shown if screen is smaller than medium--}}
                        <div class="col-md-6 d-md-none" style="margin-bottom: 10px;">
                            <img src="{{$cardImage}}" alt="Offer Card Image" style="height: 395px;">
                        </div>
                        <div class="col-md-6">
                            <form method="post" action="/offers">
                                @csrf
                                <input hidden name="cardid" id="cardidId" type="text" value="{{$cardId}}">
                                <div class="form-group">
                                    <label for="descriptionID">Description:</label>
                                    <textarea type="text" class="form-control" id="descriptionID" name="description" placeholder="Description" style="resize: none; height: 150px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="priceID">Price:</label>
                                    <input type="number" required step="0.01" min="0" class="form-control" id="priceID" name="price" placeholder="Price">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="negotiableID" name="negotiable" style="margin-right: 5px;">
                                    <label for="negotiableID">Negotiable</label>
                                </div>
                                <div class="form-group">
                                    <label for="gradeID">Grade:</label>
                                    <input type="number" class="form-control" id="gradeID" name="grade" min="0" max="10" oninput="validity.valid||(value='');">
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                            <p style="margin-top: 10px;">{{session("msg")}}</p>
                        </div>
{{--                        Image only shown if screen at least medium--}}
                        <div class="col-md-6 d-none d-md-block">
                            <img src="{{$cardImage}}" alt="Offer Card Image" style="height: 395px;">
                        </div>
                    </div>
                </div>
            @endif
        @endif

    </div>

    <div>
        @if(!$offerArray == [])
            <h2>Your previous Offers</h2>
        @endif

        <div class="container">
            <div class="row">
                @foreach($offerArray as $offer)
                    <div class="col-lg-6" style="padding: 15px;">
                        <x-offer-card :offer="$offer">
                            <form method="post" action="/offers/delete">
                                @csrf
                                <input type="hidden" name="offerId" value="{{$offer->id}}">

                                <button type="button" data-toggle="modal" data-target="#cardModal{{$offer->id}}" class="btn btn-primary btn-small">Delete Offer</button>

                                {{-- Modal for Offer Deletion --}}
                                <div class="modal fade" id="cardModal{{$offer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                Are you sure you want to delete this offer?<br><br>
                                                <button type="submit" class="btn btn-primary btn-small">Delete Offer</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </x-offer-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
