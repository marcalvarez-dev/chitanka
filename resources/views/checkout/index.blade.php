@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<h2>Finalizar compra</h2>

<h4>Método de envío</h4>

<form method="GET" action="{{ route('checkout.form') }}">
    <label>
        <input type="radio" name="shipping_method" value="home" required>
        Envío a domicilio
    </label>

    <label>
        <input type="radio" name="shipping_method" value="pickup">
        Recogida en tienda
    </label>

    <button type="submit">Continuar</button>
</form>

@isset($shipping)
@if($shipping == 'home')
<form method="POST" action="{{ route('checkout.finish') }}">
    @csrf
    <h4>Selecciona una dirección</h4>

    @forelse($addresses as $address)
    <div class="border p-2 mb-2">
        <label>
            <input type="radio" name="address_id" value="{{ $address->id }}" required>
            {{ $address->street }}
            {{ $address->city ?? '' }}
        </label>
    </div>
    @empty
    <p>No tienes direcciones</p>

    <a href="{{ route('addresses.create') }}">Añadir dirección</a>
    @endforelse

    <button type="submit">Confirmar pedido</button>

</form>
@endif

@if($shipping == 'pickup')
<form method="POST" action="{{ route('checkout.finish') }}">
    @csrf

    <input type="hidden" name="shipping_method" value="pickup">

    <p>Recogida en tienda</p>

    <button type="submit">Confirmar pedido</button>
</form>
@endif
@endisset

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
@endsection