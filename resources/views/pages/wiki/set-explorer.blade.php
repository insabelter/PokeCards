@extends('main')

@section('title', 'Set Explorer')

@section('content')
    <h1>Set Explorer</h1>

    <div class="accordion" id="accordionExample">
        <div class="card">
            @foreach($setsPerSeries as $series => $setArray)
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$series}}" aria-expanded="true" aria-controls="collapse{{$series}}">
                        {{ $series }}
                    </button>
                </h2>
            </div>
            <div id="collapse{{$series}}" class="collapse" aria-labelledby="heading{{$series}}" data-parent="#accordionExample">
                <div class="list-group">
                    @foreach($setArray as $set)
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">{{ $set->setName }}</a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
