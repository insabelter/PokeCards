@extends('main')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>

    <button type="button" id="startEditing" class="btn btn-primary" onclick="startEditing()">Edit Information</button>
    <form method="post" action="/profile">
        @csrf
        <div class="form-group">
            <label for="usernameID">Username:</label>
            <input type="text" class="form-control" id="usernameID" name="username" value="User" readonly>
        </div>
        <fieldset id="editableFieldset" disabled>
            <div class="form-group">
                <label for="passwordID">Password:</label>
                <input type="password" class="form-control" id="passwordID" name="password" value="Password">
            </div>
            <div class="form-group">
                <label for="emailID">E-Mail:</label>
                <input type="email" class="form-control" id="emailID" name="email" value="test@mail.com">
            </div>
            <div class="form-group">
                <label for="telefonID">Telefon:</label>
                <input type="text" class="form-control" id="telefonID" name="telefon" value="+01 23456789">
            </div>
            <button type="submit" class="btn btn-primary">Update Information</button>
        </fieldset>
    </form>

    <script>
        function startEditing(){
            document.getElementById("editableFieldset").disabled = false;
            document.getElementById("startEditing").disabled = true;
        }
    </script>
@endsection



