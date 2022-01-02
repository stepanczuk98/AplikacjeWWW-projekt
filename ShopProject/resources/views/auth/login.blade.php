@extends('layouts.app')

@section('content')
<h4 class="text-center mt-4">Zaloguj się</h4>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">{{ __('Adres e-mail') }}</label>

    <div>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label for="password">{{ __('Hasło') }}</label>

    <div>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div>
        <button type="submit">
            {{ __('Zaloguj') }}
        </button>
    </div>
</form>

@endsection
