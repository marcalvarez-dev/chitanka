@extends('layouts.auth')

@section('title', 'Login')

@section('content')


<h3>Register</h3>

<form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- Name --}}
    <div>
        <label for="name">Name</label>
        <input id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
            autofocus
            autocomplete="name">

        @error('name')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Last Name --}}
    <div>
        <label for="last_name">Last Name</label>
        <input id="last_name"
            type="text"
            name="last_name"
            value="{{ old('last_name') }}"
            required
            autocomplete="last_name">

        @error('last_name')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Email --}}
    <div>
        <label for="email">Email</label>
        <input id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            autocomplete="username">

        @error('email')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Password --}}
    <div>
        <label for="password">Password</label>
        <input id="password"
            type="password"
            name="password"
            required
            autocomplete="new-password">

        @error('password')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Confirm Password --}}
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password">
    </div>

    {{-- Submit --}}
    <button type="submit">
        Register
    </button>

    {{-- Login link --}}
    <div>
        <a href="{{ route('login') }}">Already registered?</a>
    </div>

</form>

@endsection