@extends('layouts.app')
@section('content')
<form action="/suma" method="POST">
    @csrf
    <label for="num1"> Numero 1: </label>
    <input type="number" name="num1" id="num1" required>
    <br>
    <label for="num2"> Numero 2: </label>
    <input type="number" name="num2" id="num2" required>
    <button type="submit">Sumar</button>
</form>
<br>
<p>Resultado: </p>

@if(isset($res))
<p> Resultado: {{$res}}</p>
@endif

@endsection