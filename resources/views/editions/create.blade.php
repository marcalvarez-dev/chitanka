@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('edition.store')}}">
    @csrf

    <label>ISBN: </label>
    <input name="isbn" type="text" class="@error('isbn') danger @enderror" />
    @error('isbn')
    <br>
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Title: </label>
    <input name="title" type="text" class="@error('title') danger @enderror" />
    @error('title')
    <br>
    <p style="color: red;">{{$message}}</p>
    @enderror

    <label>Language: </label>
    <input name="language" type="text" />
    @error('language')
    <br>
    <p style="color: red;">{{$message}}</p>
    @enderror

    <label>Publication Date: </label>
    <input name="publication_date" type="date" class="@error('publication_date') danger @enderror" />
    @error('publication_date')
    <br>
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Price: </label>
    <input name="price" type="number" step="0.01" class="@error('price') danger @enderror" />
    @error('price')
    <br>
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Stock: </label>
    <input name="stock" type="number" class="@error('stock') danger @enderror" />
    @error('stock')
    <br>
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Format: </label>
    <input name="format" type="text" class="@error('format') danger @enderror" />
    @error('format')
    <br>
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Synopsis: </label>
    <textarea name="synopsis" class="@error('synopsis') danger @enderror"></textarea>
    @error('synopsis')
    <br>
    <p style="color: red;">{{ $message }}</p>
    @enderror

    <label>Editorial:</label>
    <select name="editorial_id">
        @foreach($editorials as $editorial)
        <option value="{{ $editorial->id }}">
            {{ $editorial->name }}
        </option>
        @endforeach
    </select>

    <label>Autores:</label>

    @foreach($authors as $author)
    <div>
        <input type="checkbox" name="authors[]" value="{{ $author->id }}">
        {{ $author->name }}
    </div>
    @endforeach

    <label>Libro existente:</label>
    <select name="book_id">
        <option value="">-- Crear nuevo libro --</option>

        @foreach($books as $book)
        <option value="{{ $book->id }}">
            {{ $book->title }}
        </option>
        @endforeach
    </select>

    <label>Nuevo libro (si no existe):</label>
    <input name="new_title" type="text" placeholder="Título del libro">

    <label>Género:</label>
    <input name="genre" type="text">

    <input type="submit" value="Create Edition" />
</form>
@endsection