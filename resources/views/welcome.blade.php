@extends('layouts.app')

@section('title', 'Chitanka | Tu librería online')

@section('content')
@if($books->isEmpty())
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
            @foreach ($books as $book)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <!--<img src="{{ asset('assets/img/unknown_book.png') }}"
                     class="card-img-top portada-libro" 
                    alt="Portade del libro">-->
                    <div class="card-body">
                        <h5 class="card-title">{{$book->title}}</h5>
                        <p class="card-text">Descripcion</p>
                        <p class="card-text">{{$book->genre}}</p>
                        <p class="card-text">{{$book->book_language}}</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    </div>
</section>
@endif
@endsection