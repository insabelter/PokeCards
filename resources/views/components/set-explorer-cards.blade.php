<div class="row">
    @foreach($cardArray as $card)
        <div class="col-lg-3 col-md-4 col-6" style="padding: 0;">
            <div class="card" style="margin: 10px;">
{{--                Modal Button --}}
                <input type="image" data-toggle="modal" data-target="#cardModal{{$card->id}}" src="{{$card->smallImage}}" alt="{{$card->name}}"/>
                {{-- Modal for Card --}}
                <div class="modal fade" id="cardModal{{$card->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <img src="{{$card->largeImage}}" alt="{{$card->name}}">
                            <span>
                                <button class="btn btn-primary btn-small" style="margin: 10px;">
                                    <a href="{{ route('marketplace') }}">Search on Marketplace</a>
                                </button>
                                <button class="btn btn-primary btn-small" style="margin: 10px; float: right;">
                                    <a href="{{ route('offers') }}">Create Offer</a>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</div>
