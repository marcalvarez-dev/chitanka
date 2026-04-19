@extends('layouts.auth')

@section('title', 'Login')

@section('content')


<h3>Register</h3>

@include('layouts._partials.messages')

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

    {{-- Country --}}
    <div>
        <label for="country">País</label>
        <input id="country"
            type="text"
            name="country"
            required
            autocomplete="new-country">

        @error('country')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Province --}}
    <div>
        <label for="province">Provincia</label>
        <input id="province"
            type="text"
            name="province"
            required
            autocomplete="new-province">

        @error('province')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- City --}}
    <div>
        <label for="city">Ciudad</label>
        <input id="city"
            type="text"
            name="city"
            required
            autocomplete="new-city">

        @error('city')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Postal Code --}}
    <div>
        <label for="postal_code">Código Postal</label>
        <input id="postal_code"
            type="text"
            name="postal_code"
            required
            autocomplete="new-postal_code">

        @error('postal_code')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Street --}}
    <div>
        <label for="street">Calle</label>
        <input id="street"
            type="text"
            name="street"
            required
            autocomplete="new-street">

        @error('street')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Door number --}}
    <div>
        <label for="number">Puerta</label>
        <input id="number"
            type="text"
            name="number"
            required
            autocomplete="new-number">

        @error('number')
        <div>{{ $message }}</div>
        @enderror
    </div>

    {{-- Apartment number --}}
    <div>
        <label for="apartment_number">Piso</label>
        <input id="apartment_number"
            type="text"
            name="apartment_number"
            required
            autocomplete="new-apartment_number">

        @error('apartment_number')
        <div>{{ $message }}</div>
        @enderror
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