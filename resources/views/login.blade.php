<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>

<body>
    <a href="/welcome">Entrar</a>
    <h1>Direcciones en usuarios</h1>
    <ul>
        @foreach($user->addresses as $address)
        <li>{{$address->country}} {{$address->province}}</li>
        @endforeach
    </ul>

</body>

</html>