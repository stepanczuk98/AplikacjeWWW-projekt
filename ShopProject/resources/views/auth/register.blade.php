@extends('layouts.app')

@section('content')
<h4 class="text-center mt-4">Zarejestruj sie </h4>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">{{ __('Nazwa') }}</label>

    <div>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label for="email">{{ __('Adres e-mail') }}</label>

    <div>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <label for="password">{{ __('Hasło') }}</label>

    <div>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="password-confirm">{{ __('Potwierdź hasło') }}</label>

    <div>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div>
        <button type="submit">
            {{ __('Zarejestruj') }}
        </button>
    </div>
</form>

@endsection
