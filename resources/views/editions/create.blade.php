@extends('layouts.account')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <form method="POST" class="d-flex flex-column gap-3" action="{{route('edition.store')}}">
                @csrf

                <div class="row">
                    <label class="col-12 col-md-2">ISBN: </label>
                    <input name="isbn" type="text" class="@error('isbn') danger @enderror col-12 col-md-10" />
                    @error('isbn')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Título: </label>
                    <input name="title" type="text" class="@error('title') danger @enderror col-12 col-md-10" />
                    @error('title')
                    <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>


                <div class="row">
                    <label class="col-12 col-md-2">Idioma: </label>
                    <input name="language" class="col-12 col-md-10" type="text" />
                    @error('language')
                    <p style="color: red;">{{$message}}</p>
                    @enderror
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Fecha de publicación: </label>
                    <input name="publication_date" type="date" class="@error('publication_date') danger @enderror col-12 col-md-10" />
                    @error('publication_date')
                    <br>
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Precio: </label>
                    <input name="price" type="number" step="0.01" class="@error('price') danger @enderror col-12 col-md-10" />
                    @error('price')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Stock: </label>
                    <input name="stock" type="number" class="@error('stock') danger @enderror col-12 col-md-10" />
                    @error('stock')

                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Formato: </label>
                    <input name="format" type="text" class="@error('format') danger @enderror col-12 col-md-10" />
                    @error('format')

                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Sinopsis: </label>
                    <textarea name="synopsis" class="@error('synopsis') danger @enderror col-12 col-md-10"></textarea>
                    @error('synopsis')

                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="row">
                    <label class="col-12 col-md-2">Editorial:</label>
                    <select name="editorial_id">
                        @foreach($editorials as $editorial)
                        <option value="{{ $editorial->id }}">
                            {{ $editorial->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Autores:</label>

                    @foreach($authors as $author)
                    <div>
                        <input type="checkbox" name="authors[]" value="{{ $author->id }}">
                        {{ $author->name }}
                    </div>
                    @endforeach
                </div>

                <div class="row">
                    <label class="col-12 col-md-2">Libro existente:</label>
                    <select name="book_id">
                        <option value="">-- Crear nuevo libro --</option>

                        @foreach($books as $book)
                        <option value="{{ $book->id }}">
                            {{ $book->title }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <label class="col-12 col-md-4">Nuevo libro (si no existe):</label>
                    <input name="new_title" type="text" placeholder="Título del libro" class="col-12 col-md-8">

                </div>
                <div class="row">
                    <label class="col-12 col-md-2">Género:</label>
                    <input name="genre" type="text" class="col-12 col-md-10">
                </div>
                <div class="row">
                    <input type="submit" value="Crear edición" />
                </div>
            </form>
        </div>

    </div>
</div>

@endsection