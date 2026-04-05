@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('book.store')}}">
    @csrf
    <label>Title: </label>
    <input name="title" type="text" class="@error('title') danger @enderror" />
    @error('title')
    <br>
    <p style="color: red;">{{$message}}</p>
    @enderror

    <label>Genre: </label>
    <input name="genre" type="text" />
    @error('genre')
    <br>
    <p style="color: red;">{{$message}}</p>
    @enderror

    <label>Language: </label>
    <input name="book_language" type="text" />
    <input type="submit" value="Create" />
    @error('book_language')
    <br>
    <p style="color: red;">{{$message}}</p>
    @enderror
</form>
@endsection