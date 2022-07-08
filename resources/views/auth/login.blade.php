@extends('layouts.app')

@section('content')

<div class="card">
    <h3 class="card-title">{{ __('Login') }}</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex-column my-2">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="flex-column my-2">
            <label for="password">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="my-2">
            <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Recordar usuario') }}
            </label>
        </div>

        <div class="my-2">
            <button type="submit" class="login_register">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
            <a class="color-3 my-2" href="{{ route('password.request') }}">
                {{ __('¿Olvidó su contraseña?') }}
            </a>
            @endif
        </div>
    </form>
</div>
@endsection