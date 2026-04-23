@extends('layouts.account')

@section('content')

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

                        <button class="btn btn-primary">Guardar</button>
                    </form>

                </div>
                <div>
                    <div class="row">
                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')

                            <div class="col-12 col-md-6">
                                <button
                                    type="submit"
                                    class="btn btn-danger w-100 mt-2"
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