@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')
<section class="d-flex align-items-center" style="min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
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
                            class="form-control w-100 @error('email') is-invalid @enderror">
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="mt-2" for="password">Password</label>
                        <input id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="mb-2 form-control w-100 @error('password') is-invalid @enderror">
                    </div>

                    {{-- Remember --}}
                    <!--<div>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember me</label>
                    </div>-->

                    {{-- Forgot password --}}
                    <div>
                        <!--@if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Has olvidado tu contraseña?
                        </a>
                        @endif-->
                    </div>
                    {{-- Submit --}}
                    <button class="btn btn-primary" type="submit">
                        Iniciar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection