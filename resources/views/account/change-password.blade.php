@extends('layouts.account')

@section('title', 'Cambiar contraseña')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">

                <h2>Cambiar contraseña</h2>

                <div>
                    <form method="POST" class="d-flex flex-column gap-2" action="{{ route('password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <label class="col-12 col-md-2">Contraseña actual</label>
                            <input type="password" name="current_password" class="col-12 col-md-10" style="max-height: 30px">
                        </div>

                        <div class="row">
                            <label class="col-12 col-md-2">Nueva contraseña</label>
                            <input type="password" name="password" class="col-12 col-md-10" style="max-height: 30px;">
                        </div>

                        <div class="row">
                            <label class="col-12 col-md-2">Confirmar contraseña</label>
                            <input type="password" name="password_confirmation" class="col-12 col-md-10" style="max-height: 30px;">
                        </div>

                        <button class=" btn btn-primary mt-2">
                            Actualizar contraseña
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection