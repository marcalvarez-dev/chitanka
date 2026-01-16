@extends('layouts.app')

@section('title', 'Libro')

@section('content')
<section>
    @component('_components.card')
    @slot('title', $book->title)
    @slot('content', $book->genre)
    @endcomponent
</section>
@endsection