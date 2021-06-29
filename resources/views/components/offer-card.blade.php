<div>
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-sm" style="padding: 0;">
                    {{--                                         Image only shown as head image if screen size is xsmall--}}
                    <img class="card-img-top d-sm-none" src="{{$offer->image}}" alt="image_{{$offer->id}}" style="padding: 20px 20px 0 20px;">
                    <div class="card-body" style="height: 100%;">
                        <h4 class="card-title font-weight-bold">{{$offer->name}}</h4>
                        <h5 class="card-title">Card Type: {{$offer->cardtype}}</h5>
                        <h6 class="card-subtitle mb-2 text-primary font-weight-bold">Price: ${{$offer->price}} - {{$offer->verhandelbar}}</h6>
                        @if(isset($offer->grade))
                            <h6 class="card-subtitle mb-2 font-weight-bold">Grading: {{$offer->grade}}</h6>
                        @endif
                        <p>{{$offer->description}}</p>
                        {{ $slot }}
                    </div>
                </div>
                {{--                                    Image shown if screen size is larger than xsmall--}}
                <div class="col-sm d-none d-sm-block" style="padding: 0;">
                    <img id="offerImage" src="{{$offer->image}}" alt="image_{{$offer->id}}" style="height: 250px; float: right;">
                </div>
            </div>
        </div>
    </div>
</div>
