@extends('layouts.app')

@section('title', 'Chitanka | Tu librería online')

@section('content')


<!--Editionsbygenre es una collecion de colleciones-->
@if(empty($editionsByGenre) && empty($editions))
<p>No hay libros </p>
@else
<section class="hero text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Ofertas de hasta el 50%</h1>
        <p class="lead">Descubre libros con hasta un 50% de descuento</p>
    </div>
</section>
<section class="seccion-content">
    <div class="container">
        @include('layouts._partials.messages')

        @foreach($editionsByGenre as $genre => $editions)
        <div class="genero-titulo"">
            <h2>
                <a href=" {{route('edition.genre', $genre)}}">
            {{$genre}}
            </a>
            </h2>
        </div>
        <div class="row">
            @forelse ($editions as $edition)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-cover">
                        <a href="{{route('edition.details', $edition->id)}}">
                            <img src="{{ asset('assets/img/cover.jpg') }}"
                                class="card-img-top portada-libro"
                                alt="Portade del libro">
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('edition.details', $edition->id)}}">{{$edition->title}}</a></h5>
                        <p class="card-text">{{$edition->price}}€</p>
                        <p class="card-text"> {{$edition->book->authors->pluck('name')->join(', ')}} </p>
                        <form method="POST" action="{{route('cart.store')}}">
                            @csrf

                            <input type="hidden" name="edition_id" value="{{ $edition->id }}">

                            <button class="btn btn-primary w-100" type="submit">Añadir al carrito</button>
                        </form> @auth
                        @if(auth()->user()->role === 'admin')
                        <a href="{{route('edition.edit', $edition->id)}}" class="btn btn-secondary w-100">Modificar</a>
                        <form method="POST" action="{{route('edition.delete', $edition->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100" type="submit" value="Borrar">Eliminar</button>
                        </form>
                        @endif
                        @endauth

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endif
@endsection