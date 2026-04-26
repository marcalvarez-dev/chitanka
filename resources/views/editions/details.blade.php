@extends('layouts.app')

@section('title', $edition->title)

@section('content')
    <section>
        <div class="container d-flex justify-content-center">
            <div class="row pt-5">
                <div class="col-12 col-md-6 col-lg-6">
                    <div>
                        <img src="{{ $edition->cover ? asset('assets/img/covers/' . $edition->cover) : asset('assets/img/cover.jpg') }}"
                            class="book-cover" alt="Portada del libro">
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <div>
                        <h2>{{ $edition->title }}</h2>
                        <h5>{{ $edition->book->author->name }}</h5>
                        <h5>{{ $edition->price }}€</h5>
                        <button class="btn btn-success">Añadir al carrito</button>
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <button class="btn btn-secondary">Modificar</button>
                            @endif
                        @endauth

                        @if ($edition->stock > 0)
                            <p style="color: rgb(34, 139, 34);">En stock</p>
                        @else
                            <p>Agotado</p>
                        @endif
                        <h2>Sinopsis</h2>
                        <p>{{ $edition->synopsis }}</p>
                        <h2>Detalles del prodcuto</h2>
                        <p><strong>Editorial:</strong> {{ $edition->editorial->name }}</p>
                        <p><strong>Fecha de publicación: </strong>{{ $edition->publication_date }}</p>
                        <p><strong>Idioma:</strong> {{ $edition->language }}</p>
                        <p><strong>ISBN: </strong>{{ $edition->isbn }}</p>
                    </div>
                </div>
            </div>
    </section>
@endsection
