@extends('main')

@section('title', 'Wiki')

@section('content')



    <h1>Wiki</h1>

    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th scope="col">Set</th>
            <th scope="col">Name</th>
            <th scope="col">Card Type</th>
            <th scope="col">Release Date</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cardArray as $card)
            <tr>
                <td>{{ $card->set }}</td>
                <td>{{ $card->name }}</td>
                <td>{{ $card->type }}</td>
                <td>{{ $card->release }}</td>
                <td id="accordion{{$card->id}}">
                    <button class="btn btn-primary" data-toggle="collapse" data-target="#collapse{{$card->id}}" aria-expanded="false" aria-controls="collapse{{$card->id}}" onclick="toggleText(this)">
                        Show
                    </button>
                </td>
                <td id="collapse{{$card->id}}" class="collapse" data-parent="#accordion{{$card->id}}">
                    <img src="{{ $card->image }}" alt="Image {{ $card->name }}" height="500px">
                </td>
            </tr>

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
        @endforeach
        </tbody>
    </table>


@endsection
