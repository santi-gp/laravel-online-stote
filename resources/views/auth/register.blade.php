@extends('layouts.app')

@section('content')

<div class="card">
    <h3 class="card-title">{{ __('Registro') }}</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex-column my-2">
            <label for="name">{{ __('Nombre') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="flex-column my-2">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="flex-column my-2">
            <label for="password">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="flex-column my-2">
            <label for="password-confirm">{{ __('Confirmar contraseña') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="flex-column my-2">
            <button type="submit" class="my-2 py-2 bgc-3 color-white border-none border-r5">
                {{ __('Registro') }}
            </button>
        </div>
    </form>

</div>

@endsection