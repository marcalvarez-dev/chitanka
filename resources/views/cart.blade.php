@extends('layouts.app')

@section('title', 'Carrito')

@section('content')

@php
$total = 0;
@endphp

@if($cart && $cart->items->count())
@foreach($cart->items as $item)
@if($item->edition)
<p>{{ $item->edition->title }} x {{ $item->quantity }}</p>
@else
<p>Edición eliminada x {{ $item->quantity }}</p>
@endif
<p>{{$item->price * $item->quantity}} €</p>
@php
$total += $item->price * $item->quantity;

@endphp


<form method="POST" action="{{ route('cart.item.delete', $item->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Borrar</button>
</form>
@endforeach

<p>Total: {{$total}}</p>

<form method="post" action="{{route('cart.checkout')}}">
    @csrf
    <button type="submit">Finalizar compra</button>
</form>
@else
<p>El carrito está vacío</p>
@endif
@endsection