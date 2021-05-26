@extends('main')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>

    <button type="button" id="startEditing" class="btn btn-primary" onclick="startEditing()">Edit Information</button>
    <form method="post" action="/profile">
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
                <label for="emailID">E-Mail:</label>
                <input type="email" class="form-control" id="emailID" name="email" value={{ Auth::user()->email }}>
            </div>
            <div class="form-group">
                <label for="telefonID">Telefon:</label>
                <input type="text" class="form-control" id="telefonID" name="telefon" value="+01 23456789">
            </div>
            <button type="submit" class="btn btn-primary">Update Information</button>
        </fieldset>
    </form>

    <br />

    <form action="{{route('deleteAccount', Auth::user()->id)}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Delete my account</button>
    </form>

    <script type="text/javascript">
        function startEditing(){
            document.getElementById("editableFieldset").disabled = false;
            document.getElementById("startEditing").disabled = true;
        }
    </script>
@endsection



