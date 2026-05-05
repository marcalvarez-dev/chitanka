@extends('layouts.account')

@section('title', 'Mis pedidos')

@section('content')

    <h2>Mis pedidos</h2>

    @forelse($orders as $order)

        <div class="border p-3 mb-3">
            <h4>Pedido #{{ $order->id }}</h4>
            <span
                class="badge 
                @if ($order->status == 'pending') bg-warning
                @elseif($order->status == 'paid') bg-success
                @elseif($order->status == 'shipped') bg-primary
                @else bg-danger @endif
            ">
                {{ ucfirst($order->status) }}
            </span>

            <p><strong>Total:</strong> {{ $order->total_price }} €</p>

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
