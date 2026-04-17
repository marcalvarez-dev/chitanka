@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('edition.update', $edition->id) }}">
    @csrf
    @method('PUT')

    <label>ISBN:</label>
    <input name="isbn" type="text" value="{{ $edition->isbn }}" />

    <label>Título:</label>
    <input name="title" type="text" value="{{ $edition->title }}" />

    <label>Idioma:</label>
    <input name="language" type="text" value="{{ $edition->language }}" />

    <label>Fecha de publicación:</label>
    <input name="publication_date" type="date" value="{{ $edition->publication_date }}" />

    <label>Precio:</label>
    <input name="price" type="number" step="0.01" value="{{ $edition->price }}" />

    <label>Stock:</label>
    <input name="stock" type="number" value="{{ $edition->stock }}" />

    <label>Formato:</label>
    <input name="format" type="text" value="{{ $edition->format }}" />

    <label>Sinopsis:</label>
    <textarea name="synopsis">{{ $edition->synopsis }}</textarea>

    <label>Editorial ID:</label>
    <input name="editorial_id" type="number" value="{{ $edition->editorial_id }}" />

    <label>Book ID:</label>
    <input name="book_id" type="number" value="{{ $edition->book_id }}" />

    <label>Autores:</label>

    @foreach($authors as $author)
    <div>
        <input type="checkbox" name="authors[]" value="{{ $author->id }}">
        {{ $author->name }}
    </div>
    @endforeach

    <input type="submit" value="Update">
</form>
@endsection