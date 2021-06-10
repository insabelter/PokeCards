@extends('main')

@section('title', 'Set Explorer')

@section('content')
    <h1>Set Explorer</h1>

{{--    Special CSS Style --}}
    <style type="text/css">
        #accordion1 .btn:focus, .btn.focus, .btn.active {
            background-color: var(--primary);
            color: white;
            text-decoration: none;
        }
        #accordion1 .list-group-item-action:hover, .list-group-item-action:focus {
            background-color: var(--primary);
            color: white;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="accordion col-md-4 col-lg-3" id="accordion1" style="margin-bottom: 15px;">
                <div class="card" id="seriesContainer">
                    @foreach($setsPerSeries as $seriesName => $setArray)
                        <div class="card-header" id="heading{{str_replace([" ","&"],["","And"],$seriesName)}}" style="padding: 0;">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{str_replace([" ","&"],["","And"],$seriesName)}}" aria-expanded="true" aria-controls="collapse{{str_replace([" ","&"],["","And"],$seriesName)}}"
                                        style="padding: 6px 10px;">
                                    {{ $seriesName }}
                                </button>
                            </h2>
                        </div>
                        <div id="collapse{{str_replace([" ","&"],["","And"],$seriesName)}}" class="collapse" aria-labelledby="heading{{str_replace([" ","&"],["","And"],$seriesName)}}" data-parent="#accordion1">
                            <div class="list-group">
                                @foreach($setArray as $set)
                                    <a href="{{route('set-explorer-sets',['setId' => $set->setId])}}" class="list-group-item list-group-item-action" aria-current="true" style="padding: 6px 10px;">{{ $set->setName }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @if($currentSet != null)
            <div class="container col-md-8 col-lg-9">
                <h1><img src="{{ $currentSet->setSymbol }}" alt="setSymbol" height="36px"> {{ $currentSet->setName }}</h1>
                <h4>Release: {{ $currentSet->releaseDate }}</h4>

                <div class="accordion" id="accordion2">
                    <div class="card" id="seriesContainer">
                        @foreach($currentSetCards as $type => $array)
                            @if(sizeof($currentSetCards[$type])>0)
                            <div class="card-header" id="heading{{$type}}" style="padding: 0;">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$type}}" aria-expanded="true" aria-controls="collapse{{$type}}"
                                        style="padding: 6px 10px;">
                                    <h2 style="margin: 0;">{{ $type }} Cards</h2>
                                </button>
                            </div>
                            <div id="collapse{{$type}}" class="collapse show" aria-labelledby="heading{{$type}}" data-parent="#accordion2">
                                <x-set-explorer-cards :cardArray="$currentSetCards[$type]">
                                </x-set-explorer-cards>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
            @endif

        </div>
    </div>

@endsection
