@extends('layouts.app')

@section('title', $edition->title)

@section('content')
<section>
    <div class="container">
        <div class="row">
            <img src="{{ asset('assets/img/cover.jpg') }}"
                class="book-cover"
                alt="Portade del libro">
        </div>
        <div class="row">
            <h2>{{$edition->title}}</h2>
            <h5>{{ $edition->book->authors->pluck('name')->join(', ') }}</h5>
            <h5>{{$edition->price}}</h5>
            <button>Añadir al carrito</button>
            <button>Comprar ahora</button>
            @if($edition->stock>0)
            <p>En stock</p>
            @else
            <p>Agotado</p>
            @endif
            <h2>Sinopsis</h2>
            <p>{{$edition->synopsis}}</p>
            <h2>Detalles del prodcuto</h2>
            <p>Editorial: {{$edition->editorial->name}}</p>
            <p>Fecha de publicación: {{$edition->publication_date}}</p>
            <p>Idioma: {{$edition->language}}</p>
            <p>ISBN: {{$edition->isbn}}</p>




        </div>
    </div>
</section>

@endsection