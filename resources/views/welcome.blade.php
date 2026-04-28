@extends('layouts.app')

@section('title', 'Chitanka | Tu librería online')

@section('content')
    <section class="text-center">
        <div class="container">
            <div class="row hero">
                <h1 class="fw-bold display-5">Ofertas de hasta el 50%</h1>
                <p class="lead mt-5">Descubre libros con hasta un 50% de descuento</p>
            </div>
        </div>

        <section class="container mt-4">
            <h2>Últimas novedades</h2>

            <div class="row">
                @foreach ($latestEditions as $edition)
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <div class="card">

                            <a href="{{ route('edition.details', $edition->id) }}">
                                <img class="portada-libro"
                                    src="{{ $edition->cover ? asset('assets/img/covers/' . $edition->cover) : asset('assets/img/cover.jpg') }}"
                                    class="card-img-top">
                            </a>

                            <div class="card-body">
                                <h5>{{ $edition->title }}</h5>
                                <p>{{ $edition->price }}€</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </section>

    <section class="seccion-generos py-4">
        <div class="container">
            <div class="row">
                @foreach ($editionsByGenre as $g => $editions)
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <a href="{{ route('edition.genre', ['genre' => $g]) }}" class="text-decoration-none">
                            <div class="card text-center h-100 genero-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h5 class="mb-0">{{ $g }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="seccion-content">


        <div class="container">

            @include('layouts._partials.messages')

            @php
                $displayGenres = isset($filteredEditions) ? [$genre => $filteredEditions] : $editionsByGenre;
            @endphp

            @foreach ($displayGenres as $genreName => $editions)
                <div class="genero-titulo">
                    <h2>
                        <a href="{{ route('edition.genre', $genreName) }}">
                            {{ $genreName }}
                        </a>
                    </h2>
                </div>

                <div class="row">
                    @forelse ($editions as $edition)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card">

                                <div class="card-cover">
                                    <a href="{{ route('edition.details', $edition->id) }}">
                                        <img src="{{ $edition->cover ? asset('assets/img/covers/' . $edition->cover) : asset('assets/img/cover.jpg') }}"
                                            class="card-img-top portada-libro">
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('edition.details', $edition->id) }}">
                                            {{ $edition->title }}
                                        </a>
                                    </h5>

                                    <p class="card-price">{{ $edition->price }}€</p>
                                    <p>{{ $edition->book->author->name }}</p>

                                    <form method="POST" action="{{ route('cart.store') }}">
                                        @csrf
                                        <input type="hidden" name="edition_id" value="{{ $edition->id }}">
                                        <button class="btn btn-primary w-100">
                                            Añadir al carrito
                                        </button>
                                    </form>

                                    @auth
                                        @if (auth()->user()->role === 'admin')
                                            <a href="{{ route('edition.edit', $edition->id) }}"
                                                class="btn btn-secondary w-100">
                                                Modificar
                                            </a>

                                            <button type="button" class="btn btn-danger w-100 mt-2" data-bs-toggle="modal"
                                                data-bs-target="#confirmModal"
                                                data-url="{{ route('edition.delete', $edition->id) }}">
                                                Eliminar
                                            </button>
                                        @endif
                                    @endauth
                                </div>

                            </div>
                        </div>


                    @empty
                        <p>No hay libros en este género.</p>
                    @endforelse
                </div>
            @endforeach
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
            </form>

        </div>
    </section>
    <div class="modal fade" id="confirmModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    ¿Seguro que quieres eliminar esta edición?
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

@endsection
