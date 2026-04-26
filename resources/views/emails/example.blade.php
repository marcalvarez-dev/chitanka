<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido confirmado</title>
</head>

<body>

    <h1>Hola, {{ $name }}</h1>
    <h2>Tu compra se ha realizado con éxito</h2>

    <h5>Detalles del pedido</h5>
    <p><strong>Fecha del pedido:</strong> {{ $date }}</p>
    <div>
        @if ($address)
            <p><strong>Dirección de envío:</strong></p>

            {{ $address->street }} <br>
            {{ $address->city }} <br>
            {{ $address->postal_code }} <br>
            {{ $address->country }}
            </p>
        @else
            <p> Recogida en tienda </p>
        @endif


    </div>

    <div>
        @foreach ($items as $item)
            <p>
                {{ $item->edition->title }} x
                {{ $item->quantity }}:
                {{ $item->edition->price }}€
            </p>
        @endforeach
    </div>

    <h3>Total: {{ $total }}€</h3>

</body>

</html>
