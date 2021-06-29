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
                            <label for="cardidID">Card Id:</label>
                            <input type="text" required class="form-control" id="cardidID" name="cardid" placeholder="ID" value="{{$cardId}}">
                        </div>
                        <div class="form-group">
                            <label for="descriptionID">Description:</label>
                            <textarea type="text" class="form-control" id="descriptionID" name="description" placeholder="Description" style="resize: none; height: 150px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="priceID">Price:</label>
                            <input type="number" required step="0.01" class="form-control" id="priceID" name="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="verhandelbarID">Verhandelbar:</label>
                            <input type="checkbox" id="verhandelbarID" name="verhandelbar" style="margin-right: 10px;">
                        </div>
                        <div class="form-group">
                            <label for="gradeID">Grade:</label>
                            <input type="number" class="form-control" id="gradeID" name="grade" min="0" max="10" oninput="validity.valid||(value='');">
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
                        <x-offer-card :offer="$offer">
                            <form method="post" action="/offers/delete">
                                @csrf
                                <input type="hidden" name="offerId" value="{{$offer->id}}">
                                <button type="submit" class="btn btn-primary btn-small">Delete Offer</button>
                            </form>
                        </x-offer-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
