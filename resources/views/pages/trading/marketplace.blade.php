@extends('main')

@section('title', 'Marketplace')

@section('content')
    <h1>Marketplace</h1>

    <div class="container">
        <div class="row">
            @foreach($offerArray as $offer)
                <div class="col-lg-6" style="padding: 15px;">
                    <div id="cards">
                        <div class="card">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm" style="padding: 0;">
                                        {{--                                    Image only shown as head image if screen size is xsmall--}}
                                        <img class="card-img-top d-sm-none" src="{{$offer->image}}" alt="image_{{$offer->id}}" style="padding: 20px 20px 0 20px;">
                                        <div class="card-body">
                                            <h4 class="card-title font-weight-bold">{{$offer->name}}</h4>
                                            <h5 class="card-title">Set: {{$offer->set}}</h5>
                                            <h6 class="card-subtitle mb-2 text-primary font-weight-bold">Price: ${{$offer->price}}</h6>
                                            <p class="card-text">Offered By: <span class="font-weight-bold">{{$offer->user}}</span></p>
                                            <button class="btn btn-sm btn-primary">Contact</button>
                                        </div>
                                    </div>
                                    {{--                                Image shown if screen size is larger than xsmall--}}
                                    <div class="col-sm d-none d-sm-block" style="padding: 0;">
                                        <img id="offerImage" src="{{$offer->image}}" alt="image_{{$offer->id}}" style="height: 250px; float: right;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
