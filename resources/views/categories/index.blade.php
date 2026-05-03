@extends('layouts.account')

@section('title', 'Administrar categorias')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <h2>Categorias</h2>
                <ul class="list-unstyled">
                    @foreach ($categories as $category)
                        <li class="mb-3">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-4">
                                    <strong>{{ $category->name }}</strong>
                                </div>
                                <div class="col-12 col-md-5">
                                    <form action="{{ route('categories.update', $category) }}" method="POST"
                                        class="d-flex gap-2">
                                        @csrf
                                        @method('PUT')

                                        <input type="text" name="name" value="{{ $category->name }}"
                                            class="form-control form-control-sm">

                                        <button class="btn btn-sm btn-primary">
                                            Actualizar
                                        </button>

                                    </form>
                                </div>

                                <div class="col-12 col-md-3 mt-2 mt-md-0">
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger w-100">
                                            Borrar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <hr>

                <button type="button" class="btn btn-primary">
                    Añadir idioma
                </button>

                <form id="createForm" method="POST" action="{{ route('categories.store') }}"
                    class="flex-column gap-3 mt-3">

                    @csrf
                    <div class="row">
                        <label class="col-12 col-md-2">Categoría:</label>
                        <input name="name" type="text"
                            class="form-control col-12 col-md-10 @error('name') is-invalid @enderror">
                    </div>
                    @error('name')
                        <p style="color:red;">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <input type="submit" class="btn btn-success" value="Añadir categoria">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
