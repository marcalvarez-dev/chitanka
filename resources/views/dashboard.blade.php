@extends('layouts.account')

@section('title', 'Administrar usuario')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2>Información del perfil</h2>
                    <div>
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <label class="col-12 col-md-2">Nombre</label>
                                <input class="col-12 col-md-10" type="text" name="name"
                                    value="{{ old('name', auth()->user()->name) }}">
                            </div>

                            <div class="row">

                                <label class="col-12 col-md-2">Email</label>
                                <input type="email" class="col-12 col-md-10" name="email"
                                    value="{{ old('email', auth()->user()->email) }}">
                            </div>

                            <button class="btn btn-primary mt-2">Guardar</button>
                        </form>

                    </div>
                    <h2>Borrar perfil de usuario</h2>

                    <div>
                        <div class="row">
                            <form method="POST" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('DELETE')

                                <div class="col-12 col-md-6">
                                    <input type="password" name="password" class="form-control mt-2"
                                        placeholder="Confirma tu contraseña">

                                    <button type="submit" class="btn btn-danger w-100 mt-1"
                                        onclick="return confirm('¿Seguro que quieres borrar la cuenta?')">
                                        Borrar cuenta
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
