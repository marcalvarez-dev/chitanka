@extends('layouts.account')

@section('title', 'Hola')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Datos de facturación</h2>
            @forelse($addresses as $address)
                <div class="p-3 mb-4" style="border: 1px solid black; border-radius: 5px;">
                    <p>{{ auth()->user()->name }}, {{ auth()->user()->last_name }}</p>
                    <p>{{ $address->country }}</p>
                    <p>{{ $address->street }}</p>
                    <p>{{ $address->city }}, {{ $address->postal_code }}</p>
                    <p>{{ $address->country }}</p>


                    <a href="{{ route('addresses.edit', $address) }}">Editar</a>

                    <form method="POST" action="{{ route('addresses.destroy', $address) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            @empty
                <p>No tienes direcciones</p>
            @endforelse

        </div>
    </div>

    <a href="{{ route('addresses.create') }}">Añadir dirección</a>
@endsection
