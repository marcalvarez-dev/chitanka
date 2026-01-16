@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('book.update', $book->id)}}">
    @method('PUT')
    @csrf
    <label>Título:</label>
    <input name="title" type="text" value="{{$book->title}}" />
    <label>Género: </label>
    <input name="genre" type="text" value="{{$book->genre}}" />
    <label>Idioma: </label>
    <input name="book_language" type="text" value="{{$book->book_language}}" />
    <input type="submit" value="Update" />
</form>
@endsection