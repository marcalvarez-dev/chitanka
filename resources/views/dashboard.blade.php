@extends('layouts.account')

@section('content')

@section('title', 'Administrar usuario')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div>
                <div>
                    <div>Información del perfil</div>
                    <div>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div>
                                <label>Nombre</label>
                                <input type="text" name="name"
                                    value="{{ old('name', auth()->user()->name) }}">
                            </div>

                            <div>
                                <label>Email</label>
                                <input type="email" name="email"
                                    value="{{ old('email', auth()->user()->email) }}">
                            </div>

                            <button>Guardar</button>
                        </form>

                    </div>
                </div>
                <div>
                    <div>Eliminar cuenta</div>
                    <div>

                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('¿Seguro que quieres borrar la cuenta?')">
                                Borrar cuenta
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection