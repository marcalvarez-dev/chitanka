@extends('layouts.account')

@section('title', 'hola')

@section('content')

    <h2>Mis pedidos</h2>

    @forelse($orders as $order)

        <div class="border p-3 mb-3">
            <h4>Pedido #{{ $order->id }}</h4>
            <p>Total: {{ $order->total_price }} €</p>

            <hr>

            @foreach ($order->editions as $edition)
                <p>
                    {{ $edition->title }}
                    (x{{ $edition->pivot->quantity }})
                    - {{ $edition->pivot->unitary_price }}€
                </p>
            @endforeach
        </div>

    @empty
        <p>No tienes pedidos todavía</p>
    @endforelse

@endsection
