@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<section>
    {{-- Session status --}}
    @if (session('status'))
    <div>
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!--Diccionario-->
        @if ($errors->has('auth'))
        <div class="alert alert-danger">
            {{ $errors->first('auth') }}
        </div>
        @endif

        {{-- Email --}}
        <div>
            <label for="email">Email</label>
            <input id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                class="form-control @error('email') is-invalid @enderror">
        </div>

        {{-- Password --}}
        <div>
            <label for="password">Password</label>
            <input id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                class="form-control @error('password') is-invalid @enderror">
        </div>

        {{-- Remember --}}
        <div>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
        </div>

        {{-- Forgot password --}}
        <div>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                Forgot your password?
            </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit">
            Log in
        </button>
    </form>

</section>

@endsection