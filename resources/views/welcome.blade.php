@extends('layouts.app')

@section('title', 'Chitanka | Tu librería online')

@section('content')
    <section class="text-center">
        <div class="container">
            <div class="row hero">
                <h1 class="display-5 fw-bold">Ofertas de hasta el 50%</h1>
                <p class="lead">Descubre libros con hasta un 50% de descuento</p>
            </div>
        </div>
    </section>

    <section class="seccion-generos py-4">
        <div class="container">
            <div class="row">
                @foreach ($editionsByGenre as $g => $editions)
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <a href="{{ route('edition.genre', $g) }}" class="text-decoration-none">
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
                                        <img src="{{ $edition->cover ? asset('storage/' . $edition->cover) : asset('assets/img/cover.jpg') }}"
                                            class="card-img-top portada-libro">
                                    </a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('edition.details', $edition->id) }}">
                                            {{ $edition->title }}
                                        </a>
                                    </h5>

                                    <p>{{ $edition->price }}€</p>
                                    <p>{{ $edition->book->authors->pluck('name')->join(', ') }}</p>

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

                                            <form method="POST" action="{{ route('edition.delete', $edition->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger w-100">
                                                    Eliminar
                                                </button>
                                            </form>
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

        </div>
    </section>

@endsection
