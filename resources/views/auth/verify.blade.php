@extends('main')

@section('content')
<x-login-window :title="'Verify Your Email Address'">
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification.blade.php link has been sent to your email address.') }}
        </div>
    @endif

    {{ __('Before proceeding, please check your email for a verification.blade.php link.') }}
    {{ __('If you did not receive the email') }},
    <form class="d-inline" method="POST" action="{{ route('verification.blade.php.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
    </form>
</x-login-window>
@endsection
