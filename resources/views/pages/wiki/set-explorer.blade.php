@extends('main')

@section('title', 'Set Explorer')

@section('content')
    <h1>Set Explorer</h1>

    <div class="accordion" id="accordionExample">
        <div class="card">
            @foreach($setsPerSeries as $seriesName => $setArray)
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{str_replace([" ","&"],["","And"],$seriesName)}}" aria-expanded="true" aria-controls="collapse{{str_replace([" ","&"],["","And"],$seriesName)}}">
                        {{ $seriesName }}
                    </button>
                </h2>
            </div>
            <div id="collapse{{str_replace([" ","&"],["","And"],$seriesName)}}" class="collapse" aria-labelledby="heading{{str_replace([" ","&"],["","And"],$seriesName)}}" data-parent="#accordionExample">
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
