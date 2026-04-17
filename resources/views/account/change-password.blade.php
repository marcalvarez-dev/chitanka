@extends('layouts.account')
@section('content')
{{-- CAMBIAR PASSWORD --}}
<div>
    <div>Cambiar contraseña</div>
    <div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <div>
                <label>Nueva contraseña</label>
                <input type="password" name="password">
            </div>

            <div>
                <label>Confirmar contraseña</label>
                <input type="password" name="password_confirmation">
            </div>

            <button>Actualizar contraseña</button>
        </form>

    </div>
</div>
@endsection