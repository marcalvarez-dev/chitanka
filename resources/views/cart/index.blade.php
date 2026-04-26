@extends('layouts.app')

@section('title', 'Carrito')

@section('content')

    @php
        $total = 0;
    @endphp

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <h1>Tu cesta</h1>
                    @if ($cart && $cart->items->count())
                        @foreach ($cart->items as $item)
                            <div class="d-flex justify-content-between align-items-center border mb-2">
                                <div>
                                    @if ($item->edition)
                                        <h5>{{ $item->edition->title }}</h5>
                                    @else
                                        <h5>Edición eliminada</h5>
                                    @endif

                                    <div class="d-flex align-items-center gap-2">
                                        <form method="POST" action="{{ route('cart.item.decrease', $item->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-secondary">-</button>
                                        </form>

                                        <span>{{ $item->quantity }}</span>
                                        <form method="POST" action="{{ route('cart.item.increase', $item->id) }}">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-secondary">+</button>
                                        </form>

                                    </div>
                                </div>
                                <div>
                                    <p">
                                        {{ $item->price * $item->quantity }} €
                                        </p>
                                        <form method="POST" action="{{ route('cart.item.delete', $item->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-sm btn-danger">
                                                Borrar
                                            </button>
                                        </form>
                                </div>
                            </div>
                            @php
                                $total += $item->price * $item->quantity;
                            @endphp
                        @endforeach
                    @else
                        <p>El carrito está vacío</p>
                    @endif
                    <form method="POST" action="{{ route('cart.clear') }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-warning">
                            Vaciar carrito
                        </button>
                    </form>
                </div>

                <div class="col-12 col-lg-3">
                    <div>

                        <h3>Resumen</h3>
                        <p>Productos: {{ $cart->items->count() }}</p>
                        <h4>Total: {{ $total }} €</h4>
                        <form method="POST" action="{{ route('checkout.review') }}">
                            @csrf

                            <button class="btn btn-success w-100">
                                Finalizar compra
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
