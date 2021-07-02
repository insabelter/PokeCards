@extends('main')

@section('content')

    <h1>Welcome {{$user->name}}</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">What would you like to check out?</div>
                        <div class="card-body">
                            Would you like to see if there are interesting offers on the <a href="{{route('marketplace')}}">marketplace</a>?<br>

                            Are you looking for a special card? Then go to the <a href="{{route('card-search')}}">card search</a>?<br>

                            If you are more interested in complete sets check out the<a href="{{ route('set-explorer-sets', 'x') }}">set explorer search</a>?<br>

                            Dou you want to edit your <a href="{{route('profile')}}">profile</a>?<br>

                            Dou you know our <a href="{{route('guide')}}">grading guide</a>?<br>

                            Dou you know our <a href="{{route('guide')}}">grading guide</a>?

                        </div>
                </div>
            </div>
        </div>
    </div>


@endsection
