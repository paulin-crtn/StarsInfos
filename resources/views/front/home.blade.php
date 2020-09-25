@extends('layouts.app')

@section('title', 'Rechercher une star')

@section('content')

        <section class="stars-search">

            @if (session('status'))
                <div class="alert-success">
                    <i class="fas fa-check-circle"></i>{{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert-error">
                    <i class="fas fa-times-circle"></i>{{ session('error') }}
                </div>
            @endif

            <h2>Rechercher une star</h2>
            <input type="text" name="search-star" placeholder="Fonctionnalité autocomplete non développée">
            
            <h2>Stars ajoutées récemment</h2>
            <ul class="stars-list">
                @foreach ($stars as $star)
                    <li><a href="/star/{{ $star->id }}">{{ $star->firstname }} {{ $star->lastname }}</a></li>
                @endforeach
            </ul>

            <h2>Ajouter une star</h2>
            <a href="/manage-star/create">
                <figure class="add-star-container">
                    <img class="add-star" src="{{ asset('img/add.svg') }}" alt="add a star">
                </figure>
            </a>
        </section>

@endsection