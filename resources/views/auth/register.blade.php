@extends('layouts.auth')

@section('title', 'Registrarse')

@section('content')
<!--@if ($errors->any())
<div style="background:red;color:white;padding:10px">
    @foreach ($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif-->
<section class="d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="card p-4">
                    <h4 class="text-center mb-4">Registro de usuario</h4>
                    @include('layouts._partials.messages')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Apellidos</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                                @error('last_name') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Dirección</label>
                                <input type="text" name="street" class="form-control">
                                @error('street') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Número</label>
                                <input type="text" name="number" class="form-control" value="{{ old('number') }}">
                                @error('number') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">País</label>
                                <input type="text" name="country" class="form-control">
                                @error('country') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Provincia</label>
                                <input type="text" name="province" class="form-control">
                                @error('province') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ciudad</label>
                                <input type="text" name="city" class="form-control">
                                @error('city') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Código postal</label>
                                <input type="text" name="postal_code" class="form-control">
                                @error('postal_code') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control">
                                @error('password') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirmar contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            <div class="col-12 text-center mt-2">
                                <div class="form-check d-inline-block">
                                    <input class="form-check-input" type="checkbox" required>
                                    <label class="form-check-label">
                                        He leído y acepto la Política de privacidad
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn btn-dark px-5">
                                    REGÍSTRATE
                                </button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>
</section>

@endsection