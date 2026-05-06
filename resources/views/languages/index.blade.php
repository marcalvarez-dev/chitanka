@extends('layouts.account')

@section('title', 'Administrar idiomas')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts._partials.messages')

            <div class="col-12 col-md-8">
                <h2>Idiomas</h2>
                <ul class="list-unstyled">
                    @foreach ($languages as $language)
                        <li class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-4">
                                    <strong>{{ $language->name }}</strong>
                                </div>
                                <div class="col-12 col-md-5">
                                    <form action="{{ route('languages.update', $language) }}" method="POST"
                                        class="d-flex gap-2">
                                        @csrf
                                        @method('PUT')

                                        <input type="text" name="name" value="{{ $language->name }}"
                                            class="form-control form-control-sm">

                                        <button class="btn btn-sm btn-primary">
                                            Actualizar
                                        </button>

                                    </form>
                                </div>

                                <div class="col-12 col-md-3 mt-2 mt-md-0">

                                    <button type="button" class="btn btn-sm btn-danger w-100" data-bs-toggle="modal"
                                        data-bs-target="#confirmModal"
                                        data-url="{{ route('languages.destroy', $language) }}">
                                        Borrar
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <form id="createForm" method="POST" action="{{ route('languages.store') }}" class="flex-column gap-3 mt-3">
                    @csrf
                    <div class="row">
                        <label class="col-12 col-md-2">Idioma:</label>
                        <input name="name" type="text"
                            class="form-control col-12 col-md-10 @error('name') is-invalid @enderror">
                    </div>
                    @error('name')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                    <div class="row align-items-center justify-content-center">
                        <button type="submit" class="btn btn-success w-50 mt-2">Añadir idioma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form id="deleteForm" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    ¿Seguro que quieres eliminar esto?
                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm').submit();">
                        Sí, eliminar
                    </button>

                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('[data-bs-toggle="modal"]').forEach(btn => {
                btn.addEventListener('click', function() {

                    const url = this.getAttribute('data-url');
                    document.getElementById('deleteForm').action = url;

                });
            });

        });
    </script>

@endsection
