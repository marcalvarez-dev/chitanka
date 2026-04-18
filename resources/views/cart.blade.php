@extends('layouts.app')

@section('title', 'Carrito')

@section('content')
@if($cart && $cart->items->count())
@foreach($cart->items as $item)

<p>{{ $item->edition->title }}</p>
<p>{{ $item->edition->price }}</p>

<form method="POST" action="{{ route('cart.item.delete', $item->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Borrar</button>
</form>

@endforeach
@else
<p>El carrito está vacío</p>
@endif
@endsection