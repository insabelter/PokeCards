<div class="container">
    <div class="row">
        @foreach($cardArray as $card)
            <div class="col-lg-3 col-md-4 col-6" style="padding: 10px;">
                <div class="card" style="margin: 0;">
                    {{--                Modal Button --}}
                    <input type="image" data-toggle="modal" data-target="#cardModal{{$card->id}}" src="{{$card->smallImage}}" alt="{{$card->name}}"/>
                    {{-- Modal for Card --}}
                    <div class="modal fade" id="cardModal{{$card->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <img style="padding: 10px;" src="{{$card->largeImage}}" alt="{{$card->name}}">
                                <span>
                                <a class="btn btn-primary btn-small" style="margin: 0 10px 10px 10px;" href="{{ route('marketplace') }}">Search on Marketplace</a>
                                <a class="btn btn-primary btn-small" style="margin: 0 10px 10px 10px; float: right;" href="{{ route('offers',$card->id) }}">Create Offer</a>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

