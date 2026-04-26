@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <h2>Finalizar compra</h2>

                        <h4>Método de envío</h4>

                        <form method="GET" action="{{ route('checkout.form') }}">

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="shipping_method" value="home" required>
                                <label class="form-check-label">
                                    Envío a domicilio
                                </label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="shipping_method" value="pickup">
                                <label class="form-check-label">
                                    Recogida en tienda
                                </label>
                            </div>

                            <button class="btn btn-primary" type="submit">
                                Continuar
                            </button>

                        </form>

                        @isset($shipping)
                            @if ($shipping == 'home')
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
                                        <br>
                                    @endforelse

                                    <button class="btn btn-success mt-3" type="submit">Confirmar pedido</button>

                                </form>
                            @endif

                            @if ($shipping == 'pickup')
                                <form method="POST" action="{{ route('checkout.finish') }}">
                                    @csrf

                                    <input type="hidden" name="shipping_method" value="pickup">

                                    <p>Recogida en tienda</p>

                                    <button class="btn btn-success mt-3" type="submit">Confirmar pedido</button>
                                </form>
                            @endif
                        @endisset

                        <h4>Resumen del pedido</h4>

                        @php $total = 0; @endphp

                        @foreach ($cart->items as $item)
                            <p>
                                {{ $item->edition->title }}
                                (x{{ $item->quantity }})
                                - {{ $item->edition->price }}€
                            </p>

                            @php $total += $item->edition->price * $item->quantity; @endphp
                        @endforeach

                        <p><strong>Total: {{ $total }}€</strong></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
