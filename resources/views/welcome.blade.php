@extends('layouts.app')

@section('title', 'Chitanka | Tu librería online')

@section('content')

@include('layouts._partials.messages')

@if($editions->isEmpty())
<p>No hay libros </p>
@else
<section class="seccion-content">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 text-center">
                <div class="hero">
                    <h1>Ofertas de hasta el 50%</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($editions as $edition)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <a href="{{route('edition.details', $edition->id)}}">
                        <img src="{{ asset('assets/img/cover.jpg') }}"
                            class="card-img-top portada-libro"
                            alt="Portade del libro">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('edition.details', $edition->id)}}">{{$edition->title}}</a></h5>
                        <p class="card-text">{{$edition->price}}€</p>
                        <p class="card-text"> {{ $edition->book->authors->pluck('name')->join(', ') }}</p>

                        <p class="card-text">
                            {{ $edition->book->authors->pluck('name')->join(', ') }}
                        </p> <a href="#" class="btn btn-primary">Añadir al carrito</a>
                        @auth
                        @if(auth()->user()->role === 'admin')
                        <a href="{{route('edition.edit', $edition->id)}}" class="btn btn-primary">Modificar</a>
                        <form method="POST" action="{{route('edition.delete', $edition->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Borrar" />
                        </form>
                        @endif
                        @endauth

                    </div>
                </div>
            </div>
            @empty
            <p>Vacio</p>
            @endforelse
            <!--{{ $editions->links() }}-->


        </div>
    </div>
    </div>
</section>
@endif
@endsection