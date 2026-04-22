@extends('layouts.app')

@section('title', 'Newsletter')

@section('content')
<div class="container py-4">
    <h1>Newsletter</h1>

    <p>Suscríbete para recibir novedades.</p>

    <form method="POST" action="#">
        @csrf
        <input type="email" name="email" placeholder="Tu email">
        <button type="submit">Suscribirse</button>
    </form>
</div>
@endsection