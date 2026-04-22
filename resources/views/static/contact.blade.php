@extends('layouts.app')

@section('title', 'Sobre nosotros')

@section('content')

<section>
    <div class="container py-4">
        <form method="POST" action="#">
            @csrf

            <div>
                <label>Nombre</label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label>Mensaje</label>
                <textarea name="message" rows="5" required></textarea>
            </div>

            <button type="submit">Enviar</button>
        </form>

    </div>
</section>

@endsection