@extends('layouts.app')

@section('title', 'libro')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <img src="{{ asset('assets/img/cover.jpg') }}"
                class="book-cover"
                alt="Portade del libro">
        </div>
        <div class="row">
            <h5>{{$book->title}}</h5>

        </div>
    </div>
</section>

@endsection