@extends('layouts.account')

@section('title', 'Pedido #' . $order->id)

@section('content')
    <h2>Pedido #{{ $order->id }}</h2>

    <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
    <p><strong>Email:</strong> {{ $order->user->email }}</p>
    <p><strong>Total:</strong> {{ $order->total_price }}€</p>
    <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>

    <h5>Dirección</h5>
    <p>
        @if ($order->address)
            {{ $order->address->street }}, {{ $order->address->number }}
        @else
            Recogida en tienda
        @endif
    </p>

    <h5>Productos</h5>
    <ul>
        @foreach ($order->editions as $edition)
            <li>
                {{ $edition->title }}
                (x{{ $edition->pivot->quantity }})
            </li>
        @endforeach
    </ul>

    <h5>Cambiar estado</h5>

    <form method="POST" action="{{ route('admin.orders.status', $order) }}">
        @csrf
        @method('PATCH')

        <select name="status" class="form-select w-25">
            <option value="pendiente" {{ $order->status == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="pagado" {{ $order->status == 'pagado' ? 'selected' : '' }}>Pagado</option>
            <option value="enviado" {{ $order->status == 'enviado' ? 'selected' : '' }}>Enviado</option>
            <option value="entregado" {{ $order->status == 'entregado' ? 'selected' : '' }}>Entregado</option>
            <option value="cancelado" {{ $order->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select>

        <button class="btn btn-primary mt-2">
            Guardar
        </button>
    </form>

    <a href="{{ route('admin.orders') }}" class="btn btn-secondary btn-sm mb-3">
        Volver a pedidos
    </a>
@endsection
