@extends('main')

@section('title', 'Wiki')

@section('content')



    <h1>Wiki</h1>

    <table class="table table-responsive-sm table-hover">
        <thead>
        <tr>
            <th scope="col">Set</th>
            <th scope="col">Name</th>
            <th scope="col">Card Type</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cards as $card)
            <tr>
                <td>{{ $card->setName }}</td>
                <td>{{ $card->name }}</td>
                <td>{{ $card->cardtype }}</td>
                <td id="accordion{{$card->id}}">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#collapse{{$card->id}}" aria-expanded="false" aria-controls="collapse{{$card->id}}" onclick="toggleText(this)">
                        Show
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="5" id="collapse{{$card->id}}" class="collapse" data-parent="#accordion{{$card->id}}" style="text-align: center;">
                    <img src="{{ $card->smallImage }}" alt="Image {{ $card->name }}" height="500px">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        function toggleText(obj){
            obj.classList.toggle( "active" );
            if (obj.classList.contains("active")) {
                obj.textContent = "Hide";
            } else {
                obj.textContent = "Show";
            }
        }
    </script>

@endsection
