@extends('main')

@section('content')
<x-login-window :title="'Login'">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="col-md-2">
                <button id="show-button" type="button" class="btn btn-primary" data-toggle="tooltip" title="show/hide password" onclick="showPassword()"><img src="{{asset('images/icons/eye-unchecked.png')}}" alt="show password"></button>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</x-login-window>


<script>
    /**
     * function to make the password input visible or invisible
     */
    function showPassword(){
        const x = document.getElementById("show-button");
        const y = document.getElementById("password");
        if(y.type === "password"){
            y.type = "text";
            x.innerHTML = '<img src="{{asset('images/icons/eye-unchecked.png')}}" alt="show password">';
        }
        else if(y.type === "text"){
            y.type = "password";
            x.innerHTML = '<img src="{{asset('images/icons/eye-checked.png')}}" alt="hide password">';
        }
    }
</script>
@endsection
