@extends('main')

@section('title', 'Profile')

@section('content')

    <li class="btn btn-icon">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://img.icons8.com/color/96/000000/bullbasaur.png" alt="bullbasaur icon"/>
        </a>
        <div class="dropdown-menu dropdown-menu-right" style="margin: 0.5rem 0 0;" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ route('card-search') }}">Bullbasaur <img src="https://img.icons8.com/color/24/000000/bullbasaur.png" alt="bullbasaur icon"/></button>
            </a>
            <a class="dropdown-item" href="{{ route('set-explorer-sets', 'x') }}">Charmander <img src="https://img.icons8.com/color/24/000000/charmander.png" alt="bullbasaur icon"/></button>
            </a>
        </div>
    </li>

    <h1>Profile</h1>

    <button type="button" id="startEditing" class="btn btn-primary" onclick="startEditing()">Edit Information</button>
    <form action="{{route('edit', Auth::user()->id)}}"  method="post">
        @csrf
        <div class="form-group">
            <label for="usernameID">Username:</label>
            <input type="text" class="form-control" id="usernameID" name="username" value={{ Auth::user()->name }} readonly>
        </div>
        <fieldset id="editableFieldset" disabled>
            <div class="form-group">
                <label for="passwordID">Password:</label>
                <input type="password" class="form-control" id="passwordID" name="password" value="Password">
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" class="form-control" id="email" name="email" value={{ Auth::user()->email }}>
            </div>
            <div class="form-group">
                <label for="verified">Verified:</label>
                @if(\Illuminate\Support\Facades\Auth::user()->email_verified_at == null)
                    <button type="button" class="btn btn-primary">Verify my account</button>
                @else
                    <img src="icons/verified-badge.png" alt="verified badge"/>
                    <label for="verified">on {{Auth::user()->email_verified_at}} </label>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Information</button>
        </fieldset>
    </form>

    <br/>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteAccount">Delete my account</button>

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
                x.innerHTML = '<img src="icons/eye-checked.png" alt="show password"/>';
            }
            else if(y.type === "text"){
                y.type = "password";
                x.innerHTML = '<img src="icons/eye-unchecked.png" alt="hide password"/>';
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
                    <form action="{{route('deleteAccount', Auth::user()->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 my-col">
                                <input id="password" type="password" class="form-control" name="confirmdelete" placeholder="type in password to confirm deletion of your account.">
                            </div>
                            <div class="col-md-2">
                                <button id="show-button" type="button" class="btn btn-primary" onclick="showPassword()"><img src="icons/eye-unchecked.png" alt="show password"/></button>
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

    {{-- modal choose pokemon --}}
    <div class="modal fade" id="choosePokemon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Choose your Pokémon!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="col-lg-6" style="padding: 15px;">
                                <p class="card-text">Offered By:</p>
                                <img src="https://img.icons8.com/color/48/000000/bullbasaur.png" alt="bullbasaur icon"/>
                                <button class="btn btn-sm btn-primary">choose</button>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection



