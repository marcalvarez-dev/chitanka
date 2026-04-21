@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<h2>Finalizar compra</h2>

<form method="POST" action="#">
    @csrf

    {{-- DIRECCIONES --}}
    <h4>Selecciona una dirección</h4>

    @forelse($addresses as $address)
    <div class="border p-2 mb-2">
        <label>
            <input type="radio" name="address_id" value="{{ $address->id }}" required>

            {{ $address->street }} <br>
            {{ $address->city ?? '' }}
        </label>
    </div>
    @empty
    <p>No tienes direcciones</p>
    <a href="{{ route('addresses.create') }}">Añadir dirección</a>
    @endforelse

    <hr>

    {{-- MÉTODO DE ENVÍO (simple) --}}
    <h4>Método de envío</h4>

    <label>
        <input type="radio" name="shipping_method" value="home" checked>
        Envío a domicilio
    </label><br>

    <label>
        <input type="radio" name="shipping_method" value="pickup">
        Recogida en tienda
    </label>

    <hr>

    {{-- RESUMEN --}}
    <h4>Resumen del pedido</h4>

    @php $total = 0; @endphp

    @foreach($cart->items as $item)
    <p>
        {{ $item->edition->title }}
        (x{{ $item->quantity }})
        - {{ $item->edition->price }}€
    </p>

    @php $total += $item->edition->price * $item->quantity; @endphp
    @endforeach

    <p><strong>Total: {{ $total }}€</strong></p>

    <hr>

    <button type="submit" class="btn btn-success">
        Confirmar pedido
    </button>

</form>

@endsection