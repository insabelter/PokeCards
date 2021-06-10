<div class="row">
    @foreach($cardArray as $card)
        <div class="col-lg-3 col-md-4 col-6" style="padding: 0;">
            <div class="card" style="margin: 10px;">
                <img src="{{$card->smallImage}}" alt="{{$card->name}}">
            </div>
        </div>
    @endforeach
</div>
