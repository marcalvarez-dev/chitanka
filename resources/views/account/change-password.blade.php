@extends('layouts.account')

@section('title', 'Cambiar contraseña')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">

                <h2>Cambiar contraseña</h2>

                <div>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <label class="col-12 col-md-2">Actual</label>
                            <input type="password" name="current_password" class="col-12 col-md-10">
                        </div>

                        <div class="row">
                            <label class="col-12 col-md-2">Nueva</label>
                            <input type="password" name="password" class="col-12 col-md-10">
                        </div>

                        <div class="row">
                            <label class="col-12 col-md-2">Confirmar</label>
                            <input type="password" name="password_confirmation" class="col-12 col-md-10">
                        </div>

                        <button class="btn btn-primary mt-2">
                            Actualizar contraseña
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection