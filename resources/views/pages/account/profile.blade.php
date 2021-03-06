@extends('main')

@section('title', 'Profile')

@inject('profile', 'App\Http\Controllers\ProfileController')
@section('content')

    {{--easteregg button that gives the safariball as a status--}}
    <form method="post" action="/profile/easteregg">
        @csrf
        <button type="submit" class="btn btn-icon"><img src="{{asset('images/icons/pikachu.png')}}" alt="pikachu"/></button>
    </form>

    <h1>Profile</h1>

    @if (session('successEasteregg'))
        <div class="alert alert-success">
            {{ session('successEasteregg') }}
        </div>
    @endif

    {{--enable the user to change his email or password--}}
    <button type="button" id="startEditing" class="btn btn-primary" onclick="startEditing()" style="margin-bottom: 15px;">Edit Information</button>
    <form action="{{route('edit')}}"  method="post">
        @csrf
        <div class="form-group">
            <label for="usernameID">Username:</label>
            <input type="text" class="form-control" id="usernameID" name="username" value={{$user->name}} readonly>
        </div>
        <fieldset id="editableFieldset" disabled>
            <div class="form-group">
                <label for="passwordID">Password:</label>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changePassword" style="margin-left:5px;">Change my password</button>
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

    {{--show if the account of the user is verified or display a button for verification--}}
    <div style="margin: 15px 0;">
        @if(!$verified)
            <form action="{{route('verficationMail')}}" method="get" style="margin: 15px 0;">
                <button type="submit" class="btn btn-primary" style="display: inline-block;">Verify my account</button>
            </form>
        @else
            <label for="verified">Verified:</label>

            <img src="{{asset('images/icons/verified-badge.png')}}" alt="verified badge"/>
            <label for="verified">on {{$user->email_verified_at}} </label>

            <br>
        @endif
    </div>

    {{--Display the status of the user--}}
    <div style="margin: 15px 0;">
        <label for="status">Status:</label>
        @if($user->is_admin)
            <img src="{{asset('images/icons/ultraball.png')}}" alt="ultraball">
            Ultraball: You are an administrator of the Pok??Cards site.<br>
            You have the right to edit and delete users.
        @elseif($verified)
            <img src="{{asset('images/icons/superball.png')}}" alt="superball">
            Superball: You're a verified member of the Pok??Cards Community.<br>
            That will show up in your offers and so you are more reliable.
        @else
            <img src="{{asset('images/icons/pokeball.png')}}" alt="pokeball">
            Pokeball: You're a member of the Pok??Cards Community as you have an account.<br>
            To get the Superball and become trustworthy please verify your E-Mail address.
        @endif
        @if($user->easteregg === 1)
            <br>
            <img src="{{asset('images/icons/safariball.png')}}" alt="ultraball">
            Safariball: You are a true discoverer and found the easter egg.
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
                x.innerHTML = '<img src="{{asset('images/icons/eye-checked.png')}}" alt="show password"/>';
            }
            else if(y.type === "text"){
                y.type = "password";
                x.innerHTML = '<img src="{{asset('images/icons/eye-unchecked.png')}}" alt="hide password"/>';
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
                                <button id="show-button" type="button" class="btn btn-primary" data-toggle="tooltip" title="show/hide password" onclick="showPassword()"><img src="{{asset('images/icons/eye-unchecked.png')}}" alt="show password"/></button>
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



