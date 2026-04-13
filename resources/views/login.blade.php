<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>

<body>
    <a href="/welcome">Entrar</a>
    <h1>Libros: </h1>
    <ul>
        @foreach($authors as $author)
        <h2>{{ $author->name }}</h2>

        <ul>
            @foreach($author->books as $book)
            <li>{{ $book->title }}</li>
            @endforeach
        </ul>
        @endforeach
    </ul>

</body>

</html>