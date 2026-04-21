@extends('layouts.account')

@section('title', 'Hola')

@section('content')
<h2>Mis direcciones</h2>


@forelse($addresses as $address)
<div class="border p-2 mb-2">
    <p>{{ $address->street }}</p>

    <a href="{{ route('addresses.edit', $address) }}">Editar</a>

    <form method="POST" action="{{ route('addresses.destroy', $address) }}">
        @csrf
        @method('DELETE')
        <button>Eliminar</button>
    </form>
</div>
@empty
<p>No tienes direcciones</p>
@endforelse

<a href="{{ route('addresses.create') }}">Añadir dirección</a>
@endsection