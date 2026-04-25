@extends('layouts.account')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST" class="d-flex flex-column gap-3" action="{{ route('edition.store') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">ISBN: </label>
                        <input name="isbn" type="text"
                            class="@error('isbn') danger @enderror col-12 col-md-12 col-lg-10" />
                        @error('isbn')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Título: </label>
                        <input name="title" type="text"
                            class="@error('title') danger @enderror col-12 col-md-12 col-lg-10" />
                        @error('title')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Idioma: </label>
                        <select name="language" class="col-12 col-md-10">
                            <option value="Español">Español</option>
                            <option value="Inglés">Inglés</option>
                            <option value="Francés">Francés</option>
                            <option value="Alemán">Alemán</option>
                        </select> @error('language')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Fecha de publicación: </label>
                        <input name="publication_date" type="date"
                            class="@error('publication_date') danger @enderror col-12 col-md-12 col-lg-10" />
                        @error('publication_date')
                            <br>
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Precio: </label>
                        <input name="price" type="number" step="0.01"
                            class="@error('price') danger @enderror col-12 col-md-12 col-lg-10" />
                        @error('price')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Stock: </label>
                        <input name="stock" type="number"
                            class="@error('stock') danger @enderror col-12 col-md-12 col-lg-10" />
                        @error('stock')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Formato: </label>
                        <select name="format" class="col-12 col-md-10">
                            <option value="Tapa dura">Tapa dura</option>
                            <option value="Tapa blanda">Tapa blanda</option>
                            <option value="Ebook">Ebook</option>
                        </select>
                        @error('format')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Sinopsis: </label>
                        <textarea name="synopsis" class="@error('synopsis') danger @enderror col-12 col-md-12 col-lg-10"></textarea>
                        @error('synopsis')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Editorial:</label>
                        <select class="col-12 col-md-10" name="editorial_id">
                            @foreach ($editorials as $editorial)
                                <option value="{{ $editorial->id }}">
                                    {{ $editorial->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Autor:</label>
                        <input type="text" name="author" class="col-12 col-md-10">
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Libro existente:</label>
                        <select name="book_id">
                            <option value="">-- Crear nuevo libro --</option>

                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">
                                    {{ $book->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Nuevo libro (si no existe):</label>
                        <input name="new_title" type="text" placeholder="Título del libro"
                            class="col-12 col-md-12 col-lg-10">

                    </div>
                    <div class="row">
                        <label class="col-12 col-md-12 col-lg-2">Género:</label>
                        <select name="genre" class="col-12 col-md-10">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-primary" value="Crear edición" />
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
