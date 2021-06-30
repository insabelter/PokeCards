@extends('main')

@section('title', 'Profile')

@inject('profile', 'App\Http\Controllers\ProfileController')
@section('content')

    <li class="btn btn-icon">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://img.icons8.com/color/96/000000/bullbasaur.png" alt="bullbasaur icon"/>
        </a>
        <div class="dropdown-menu dropdown-menu-right" style="margin: 0.5rem 0 0;" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('card-search') }}">Bullbasaur <img src="https://img.icons8.com/color/48/000000/bullbasaur.png" alt="bullbasaur icon"/></button>
            </a>
            <a class="dropdown-item" href="{{ route('set-explorer-sets', 'x') }}">Charmander <img src="https://img.icons8.com/color/24/000000/charmander.png" alt="bullbasaur icon"/></button>
            </a>
        </div>
    </li>

    <h1>Profile</h1>

    <button type="button" id="startEditing" class="btn btn-primary" onclick="startEditing()">Edit Information</button>
    <form action="{{route('edit')}}"  method="post">
        @csrf
        <div class="form-group">
            <label for="usernameID">Username:</label>
            <input type="text" class="form-control" id="usernameID" name="username" value={{$user->name}} readonly>
        </div>
        <fieldset id="editableFieldset" disabled>
            <div class="form-group">
                <label for="passwordID">Password:</label>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePassword">Change my password</button>
            </div>
            @if (session('errorChange'))
                <div class="alert alert-danger">
                    {{ session('errorChange') }}
                </div>
            @endif
            @if (session('successChange'))
                <div class="alert alert-success">
                    {{ session('successChange') }}
                </div>
            @endif
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" class="form-control" id="email" name="email" value={{$user->email}}>
            </div>
            @if (session('successEdit'))
                <div class="alert alert-success">
                    {{ session('successEdit') }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Update Information</button>
        </fieldset>
    </form>

    <div style="margin: 15px 0;">
        @if(!$verified)
            <form action="{{route('verficationMail')}}" method="get" style="margin: 15px 0;">
                <button type="submit" class="btn btn-primary" style="display: inline-block;">Verify my account</button>
            </form>
        @else
            <label for="verified">Verified:</label>
            <img src="{{asset('icons/verified-badge.png')}}" alt="verified badge"/>
            <label for="verified">on {{$user->email_verified_at}} </label>
            <br>
        @endif
    </div>

    <div style="margin: 15px 0;">
        <label for="status">Status:</label>
        @if($user->is_admin)
            <img src="{{asset('icons/ultraball.png')}}" alt="pokeball">
        @elseif($verified)
            <img src="{{asset('icons/superball.png')}}" alt="superball">
        @else
            <img src="{{asset('icons/pokeball.png')}}" alt="superball">
        @endif
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteAccount">Delete my account</button>

    @if (session('errorDelete'))
        <div class="alert alert-danger">
            {{ session('errorDelete') }}
        </div>
    @endif
    @if (session('successDelete'))
        <div class="alert alert-success">
            {{ session('successDelete') }}
        </div>
    @endif

    <script type="text/javascript">
        function startEditing(){
            document.getElementById("editableFieldset").disabled = false;
            document.getElementById("startEditing").disabled = true;
        }
        function showPassword(){
            const x = document.getElementById("show-button");
            const y = document.getElementById("password");
            if(y.type === "password"){
                y.type = "text";
                x.innerHTML = '<img src="{{asset('icons/eye-checked.png')}}" alt="show password"/>';
            }
            else if(y.type === "text"){
                y.type = "password";
                x.innerHTML = '<img src="{{asset('icons/eye-unchecked.png')}}" alt="hide password"/>';
            }
        }
    </script>

    {{-- modal deleteAccount --}}
    <div class="modal fade" id="deleteAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please insert your password to delete your account.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('deleteAccount')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 my-col">
                                <input id="password" type="password" class="form-control" name="confirmdelete" placeholder="type in password to confirm deletion of your account.">
                            </div>
                            <div class="col-md-2">
                                <button id="show-button" type="button" class="btn btn-primary" onclick="showPassword()"><img src="{{asset('icons/eye-unchecked.png')}}" alt="show password"/></button>
                            </div>
                            <br/>
                            <br/>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Delete my account</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    {{-- modal change password --}}
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Change your password:</h2>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                        @csrf

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password">Current Password</label>

                            <div>
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password">New Password</label>

                            <div>
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm">Confirm New Password</label>

                            <div>
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection



