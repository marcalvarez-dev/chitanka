@extends('layouts.account')

@section('title', 'Administrar pedidos')

@section('content')
    @foreach ($orders as $order)
        <div class="card">
            <div class="card-body">
                <h5>Pedido #{{ $order->id }}</h5>

                <p><strong>Usuario:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <p><strong>Total:</strong> {{ $order->total_price }}€</p>
                <p><strong>Estado:</strong> {{ $order->status }}</p>

                <h6>Productos:</h6>
                <ul>
                    @foreach ($order->editions as $edition)
                        <li>
                            {{ $edition->title }}
                            (x{{ $edition->pivot->quantity }})
                            - {{ $edition->price }}€
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <form method="POST" action="{{ route('admin.orders.status', $order) }}">
            @csrf
            @method('PATCH')

            <select name="status" class="form-select">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <button type="submit" class="btn btn-primary">
                Cambiar estado
            </button>
        </form>
    @endforeach
@endsection
