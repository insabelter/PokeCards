@extends('main')

@section('title', 'Admin')

@section('content')

    <h1>Admin Menu</h1>

    <form name="namesearch" action="" method="get" style="margin: 15px 0;">
        <div class="col-lg-3 col-md-6" style="padding: 0;">
            <div class="input-group">
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter user name">
                <div class="input-group-append">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </div>
    </form>

    <table class="table table-hover" style="">
        <thead>
        <tr class="table-primary">
            <th scope="col" style="width: 25%;">Name</th>
            <th scope="col" style="width: 25%;">E-Mail</th>
            <th scope="col" style="width: 25%;">Verified</th>
        </tr>
        </thead>
        <tbody>

        @if(isset($_GET['username']))
            @foreach($users as $user)
                @if(str_contains(strtolower($user->name),strtolower($_GET['username'])) && $_GET['username']!="" && $_GET['username']!=" ")
                    <tr>
                        <td>{{ $user->name }} <br>
                        </td>
                        <td>{{ $user->email }}
                        </td>
                        <td>{{ $user->email_verified_at }}</td>
                    </tr>
                @endif
            @endforeach
        @endif
        </tbody>
    </table>

@endsection

