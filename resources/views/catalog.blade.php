@extends('layouts.app')

@section('title', 'Catálogo')

@section('content')
<h1>Catálogo</h1>
@component('_components.card')
@slot('title', 'Catálogo')
@slot('content', 'Lore ipsum')
@endcomponent
@endsection