@extends('main')

@section('title', 'Wiki')

@section('content')



    <h1>Wiki</h1>

    <form name="namesearch" action="" method="get" style="margin: 15px 0;">
        <div class="col-lg-3 col-md-6" style="padding: 0;">
            <div class="input-group">
                <input type="text" name="pokemonname" id="pokemonname" class="form-control" placeholder="Enter Name of Pokemon">
                <div class="input-group-append">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </form>

    <table class="table table-hover" style="">
        <thead>
        <tr class="table-primary">
            <th scope="col" style="width: 25%;">Set</th>
            <th scope="col" style="width: 25%;">Name</th>
            <th scope="col" style="width: 25%;">Card Type</th>
{{--                    Only shown if screen larger than very small--}}
            <th scope="col" class="d-none d-sm-table-cell" style="width: 25%;">Image</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($_GET['pokemonname']))
            @foreach($cards as $card)
                @if(str_contains(strtolower($card->name),strtolower($_GET['pokemonname'])) && $_GET['pokemonname']!="" && $_GET['pokemonname']!=" ")
                <tr>
                    <td>{{ $card->setName }} <br>
                        <button class="btn btn-primary d-sm-none" style="margin-top: 5px;" data-toggle="collapse" data-target="#collapse{{$card->id}}" aria-expanded="false" aria-controls="collapse{{$card->id}}" onclick="toggleText(this,'Show Image')">
                            Show Image
                        </button>
                    </td>
                    <td>{{ $card->name }}
                    </td>
                    <td>{{ $card->cardtype }}</td>
{{--                    Only shown if screen larger than very small--}}
                    <td id="accordion{{$card->id}}" class="d-none d-sm-table-cell">
                        <button class="btn btn-primary" data-toggle="collapse" data-target="#collapse{{$card->id}}" aria-expanded="false" aria-controls="collapse{{$card->id}}" onclick="toggleText(this,'Show')">
                            Show
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" id="collapse{{$card->id}}" class="collapse" data-parent="#accordion{{$card->id}}" style="text-align: center;">
                        <img src="{{ $card->smallImage }}" alt="Image {{ $card->name }}" height="500px">
                    </td>
                </tr>
                @endif
            @endforeach
        @endif
        </tbody>
    </table>

    <script type="text/javascript">
        function toggleText(obj, show_text){
            obj.classList.toggle( "active" );
            if (obj.classList.contains("active")) {
                obj.textContent = "Hide";
            } else {
                obj.textContent = show_text;
            }
        }
    </script>

@endsection
