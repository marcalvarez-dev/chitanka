@extends('layouts.account')

@section('title', 'Administrar pedidos')

@section('content')
    <form method="GET">
        <select name="status" class="form-select">
            <option value="">-- Estado --</option>
            <option value="pendiente" {{ request('status') == 'pendiente' ? 'selected' : '' }}>En curso</option>
            <option value="pagado" {{ request('status') == 'pagado' ? 'selected' : '' }}>Pagado</option>
            <option value="enviado" {{ request('status') == 'enviado' ? 'selected' : '' }}>Enviado</option>
            <option value="cancelado" {{ request('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            <option value="entregado" {{ request('status') == 'entregado' ? 'selected' : '' }}>Entregado</option>

        </select>
        <input type="date" name="from" value="{{ request('from') }}" class="form-control">
        <input type="date" name="to" value="{{ request('to') }}" class="form-control">

        <button class="btn btn-primary mt-2 mb-2"> Filtrar
        </button>
    </form>
    @foreach ($orders as $order)
        <a href="{{ route('admin.orders.show', $order) }}">
            <div class="border rounded p-2 mb-2 small">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        #{{ $order->id }}
                        — {{ $order->user->name }}
                        {{ $order->user->last_name }}
                        — {{ $order->total_price }}€
                    </div>

                    <div>
                        <span class="badge bg-secondary">
                            {{ $order->status }}
                        </span>
                    </div>
                </div>
                <div class="text-muted small">
                    {{ $order->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
        </a>
    @endforeach
    {{ $orders->links() }}
@endsection
