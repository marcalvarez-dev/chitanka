@extends('layouts.app')
@section('content')
<section id="hero">
    <h1>Ofertas de hasta el 50%</h1>
</section>
<section>
    <table>
        <thead>
            <th>ID</th>
            <th>Género</th>
            <th>Título</th>
            <th>Idioma</th>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{$book->id_book}} </td>
                <td>{{$book->genre}} </td>
                <td>{{$book->title}} </td>
                <td>{{$book->book_language}} </td>
            </tr>
            @endforeach
        <tbody>

    </table>
</section>


@endsection