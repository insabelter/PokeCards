@extends('main')

@section('title', 'Profile')

@inject('profile', 'App\Http\Controllers\ProfileController')
@section('content')
    <h1>Profile</h1>

{{--    <button type="button" class="btn btn-sm btn-primary" onclick="{{$profile::sendVarificationMail()}}">Send Varification Mail</button>--}}
    <form action="{{route('verficationMail')}}" method="get" style="margin: 15px 0;">
        <h4 style="margin-bottom: 15px; display: inline-block; margin-right: 15px;">({{$verified_text}})</h4>
{{--        @if(!$verified)--}}
            <button type="submit" class="btn btn-primary btn-sm" style="display: inline-block;">Send New Varification Mail</button>
{{--        @endif--}}
    </form>


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

    <br />

    <form action="{{route('deleteAccount', Auth::user()->id)}}" method="post">
        @csrf
        <input type="text" class="form-control" name="confirmdelete" placeholder="type in DELETE to confirm deletion of your account.">
        <br />
        <button type="submit" class="btn btn-primary">Delete my account</button>
    </form>

    <script type="text/javascript">
        function startEditing(){
            document.getElementById("editableFieldset").disabled = false;
            document.getElementById("startEditing").disabled = true;
        }
    </script>
@endsection



