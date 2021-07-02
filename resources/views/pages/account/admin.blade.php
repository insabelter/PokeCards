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
            <th scope="col" style="width: 20%;">Name</th>
            <th scope="col" style="width: 20%;">E-Mail</th>
            <th scope="col" style="width: 20%;">Verified at</th>
            <th scope="col" style="width: 10%;">Is Admin?</th>
            <th scope="col" style="width: 15%;">Make Admin</th>
            <th scope="col" style="width: 15%;">Delete</th>
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
                        @if($user->is_admin == 1)
                            <td>yes</td>

                            <td class="d-none d-sm-table-cell">
                                <form method="post" action="/admin/revoke">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-primary btn-small">Revoke Admin</button>
                                </form>
                            </td>
                        @else
                            <td>no</td>

                            <td class="d-none d-sm-table-cell">
                                <form method="post" action="/admin/make">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <button type="submit" class="btn btn-primary btn-small">Make Admin</button>
                                </form>
                            </td>
                        @endif
                        <td class="d-none d-sm-table-cell">
                            <form method="post" action="/admin/delete">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">

                                <button type="button" data-toggle="modal" data-target="#deleteUser{{$user->id}}" class="btn btn-primary btn-small">Delete User</button>

                                {{-- Modal for user deletion --}}
                                <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                Are you sure you want to delete the account of {{$user->name}}?<br><br>
                                                <button type="submit" class="btn btn-primary btn-small">Delete User</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach

         {{--default -> all accounts if no name is entered--}}
         @else
             @foreach($users as $user)
                 <tr>
                     <td>{{ $user->name }} <br>
                     </td>
                     <td>{{ $user->email }}
                     </td>
                     <td>{{ $user->email_verified_at }}</td>

                     @if($user->is_admin == 1)
                         <td>yes</td>

                         <td class="d-none d-sm-table-cell">
                             <form method="post" action="/admin/revoke">
                                 @csrf
                                 <input type="hidden" name="id" value="{{$user->id}}">
                                 <button type="submit" class="btn btn-primary btn-small">Revoke Admin</button>
                             </form>
                         </td>
                     @else
                         <td>no</td>

                         <td class="d-none d-sm-table-cell">
                             <form method="post" action="/admin/make">
                                 @csrf
                                 <input type="hidden" name="id" value="{{$user->id}}">
                                 <button type="submit" class="btn btn-primary btn-small">Make Admin</button>
                             </form>
                         </td>
                     @endif

                     {{-- delete the user in the row --}}
                     <td class="d-none d-sm-table-cell">
                         <form method="post" action="/admin/delete">
                             @csrf
                             <input type="hidden" name="id" value="{{$user->id}}">
                             <button type="button" data-toggle="modal" data-target="#deleteUser{{$user->id}}" class="btn btn-primary btn-small">Delete User</button>

                             {{-- Modal for user deletion --}}
                             <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">
                                         <div class="modal-body">
                                             Are you sure you want to delete the account of {{$user->name}}?<br><br>
                                             <button type="submit" class="btn btn-primary btn-small">Delete User</button>
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                         </form>
                     </td>
                 </tr>
             @endforeach
         @endif
        </tbody>
    </table>

@endsection

