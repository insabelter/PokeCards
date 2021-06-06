@extends('main')

@section('title', 'Profile')

@section('content')
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
                <label for="telefonID">Telefon:</label>
                <input type="text" class="form-control" id="telefonID" name="telefon" value="+01 23456789">
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
                        <input type="password" class="form-control" name="confirmdelete" placeholder="type in your password to confirm deletion of your account.">
                        <br/>
                        <button type="submit" class="btn btn-primary">Delete my account</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection



