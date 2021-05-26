@extends('main')

@section('title', 'Marketplace')

@section('content')
    <h1>Marketplace</h1>

    <div class="container">
        <div class="row">

            <div class="col-md-6" style="padding: 15px;">
                <div id="cards">
                    <div class="card">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm" style="padding: 0;">
{{--                                    Image only shown as head image if screen size is xsmall--}}
                                    <img class="card-img-top d-sm-none" src="https://images.pokemontcg.io/base1/1_hires.png" alt="image_alakazam">
                                    <div class="card-body">
                                        <h5 class="card-title">Alakazam</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Price: $16</h6>
                                        <p class="card-text">Offered By: UserXYZ</p>
                                        <button class="btn btn-sm btn-primary">Contact</button>
                                    </div>
                                </div>
{{--                                Image shown if screen size is larger than xsmall--}}
                                <div class="col-sm d-none d-sm-block" style="padding: 0;">
                                    <img id="offerImage" src="https://images.pokemontcg.io/base1/1_hires.png" alt="image_alakazam" style="height: 250px; float: right;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
