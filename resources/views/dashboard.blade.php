@extends('layouts.account')

@section('content')

@section('title', 'Administrar usuario')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <h2>Mi cuenta</h2>
            {{-- MENSAJE --}}
            @if (session('status'))
            <div>
                {{ session('status') }}
            </div>
            @endif
        </div>
        <div class="row">
            <div>

                {{-- INFORMACIÓN PERFIL --}}
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

                {{-- INFORMACIÓN DE DIRECCIONES --}}
                <div>
                    <div>Tus direcciones</div>
                    <div>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <button>Guardar</button>
                        </form>

                    </div>
                </div>

                {{-- BORRAR CUENTA --}}
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