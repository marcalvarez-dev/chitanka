@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">

                    <h2 class="mb-4">Editar edición</h2>

                    <form method="POST" action="{{ route('edition.update', $edition->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label">ISBN:</label>
                                <input name="isbn" type="text" class="form-control" value="{{ $edition->isbn }}" />
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label">Título:</label>
                                <input name="title" type="text" class="form-control" value="{{ $edition->title }}" />
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label">Idioma:</label>
                                <select name="language" class="form-select">
                                    @php
                                        $languages = ['Español', 'Inglés', 'Francés', 'Alemán'];
                                    @endphp

                                    @foreach ($languages as $lang)
                                        <option value="{{ $lang }}"
                                            {{ $edition->language == $lang ? 'selected' : '' }}>
                                            {{ $lang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-6 mb-3">
                                <label class="form-label">Fecha de publicación:</label>
                                <input name="publication_date" type="date" class="form-control"
                                    value="{{ $edition->publication_date }}" />
                            </div>

                            <div class="col-12 col-md-4 mb-3">
                                <label class="form-label">Precio:</label>
                                <input name="price" type="number" step="0.01" class="form-control"
                                    value="{{ $edition->price }}" />
                            </div>

                            <div class="col-12 col-md-4 mb-3">
                                <label class="form-label">Stock:</label>
                                <input name="stock" type="number" class="form-control" value="{{ $edition->stock }}" />
                            </div>

                            <div class="col-12 col-md-4 mb-3">
                                <label class="form-label">Formato:</label>
                                @php
                                    $formats = ['Tapa dura', 'Tapa blanda', 'Ebook'];
                                @endphp

                                <select name="format" class="form-select">
                                    @foreach ($formats as $format)
                                        <option value="{{ $format }}"
                                            {{ $edition->format == $format ? 'selected' : '' }}>
                                            {{ $format }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Sinopsis:</label>
                                <textarea name="synopsis" class="form-control" rows="4">{{ $edition->synopsis }}</textarea>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Editorial:</label>
                                <select name="editorial_id" class="form-select">
                                    @foreach ($editorials as $editorial)
                                        <option value="{{ $editorial->id }}"
                                            {{ $edition->editorial_id == $editorial->id ? 'selected' : '' }}>
                                            {{ $editorial->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label">Género:</label>
                                <select name="category_id" class="form-select">
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}"
                                            {{ $edition->category_id == $genre->id ? 'selected' : '' }}>
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-warning w-100">
                                    Modificar
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
