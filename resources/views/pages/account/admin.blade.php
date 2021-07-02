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
                                <form action="">
                                    @csrf
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmDeletion">Revoke Admin</button>
                                </form>
                            </td>
                        @else
                            <td>no</td>
                            <td class="d-none d-sm-table-cell">
                                <form action="">
                                    @csrf
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmDeletion">Test Admin</button>
                                </form>
                            </td>
                        @endif
                        <td class="d-none d-sm-table-cell">
                            <form action="">
                                @csrf
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmDeletion">Delete user</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
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
                             <form action="">
                                 @csrf
                                 <a class="btn btn-primary" href="">Revoke Admin</a>
                             </form>
                         </td>
                     @else
                         <td>no</td>
                         <td class="d-none d-sm-table-cell">
                             <form action="">
                                 @csrf
                                 <a class="btn btn-primary" href="">Make Admin</a>
                             </form>
                         </td>
                     @endif

                     <td class="d-none d-sm-table-cell">
                         <form action="">
                             @csrf
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmDeletion">Delete user</button>
                         </form>
                     </td>
                 </tr>
             @endforeach
         @endif
        </tbody>
    </table>

    {{-- modal confirm deletion --}}
    <div class="modal fade" id="confirmDeletion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete the user {{$user->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Yes, I'm sure</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection

