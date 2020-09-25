@extends('layouts.app')

@section('title')
    @if (isset($star))
        Modifier la fiche de {{ $star->firstname }} {{ $star->lastname }}
    @else
        Ajouter une star
    @endif
@endsection

@section('content')

        <section class="star-manage-container">

            @if (isset($star))
                <h2>Modifier la fiche de {{ $star->firstname }} {{ $star->lastname }}</h2>
            @else
                <h2>Ajouter une star</h2>
            @endif

            <h3><i class="fas fa-info-circle"></i>Tous les champs sont obligatoires à l'exception de la photo.</h3>

            @if (isset($star))
            <form 
                action="/manage-star/update/{{$star->id}}"
                method="POST" 
                enctype="multipart/form-data">
            @else
                <form 
                action="/manage-star/create"
                method="POST" 
                enctype="multipart/form-data">
            @endif
                @csrf

                <div class="form-field">
                    <label for="firstname">Prénom</label>
                    <input 
                    type="text" 
                    name="firstname" 
                    value="{{old('firstname', $star->firstname ?? '')}}"
                    id="firstname">

                    @if($errors->first('firstname'))
                        <div class="error-message">
                            {{ $errors->first('firstname') }}
                        </div>
                    @endif
                </div>

                <div class="form-field">
                    <label for="lastname">Nom</label>
                    <input 
                    type="text" 
                    name="lastname" 
                    value="{{old('lastname', $star->lastname ?? '')}}"
                    id="lastname">

                    @if($errors->first('lastname'))
                        <div class="error-message">
                            {{ $errors->first('lastname') }}
                        </div>
                    @endif
                </div>

                <div class="form-field">
                    <label for="description">Description</label>
                    <textarea 
                    name="description"
                    id="description">{{ old('description', $star->description ?? '') }}</textarea>

                    @if($errors->first('description'))
                        <div class="error-message">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="form-field">
                    <label for="photo">Photo</label>
                    <p class="sub-label">Format jpg ou png, maximum 2 Mo.</p>
                    <input 
                    type="file" 
                    name="photo" 
                    id="photo">

                    @if($errors->first('photo'))
                        <div class="error-message">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                </div>

                <div class="buttons">
                    <a class="btn btn-dark" href="/">Annuler</a>
                    @if (isset($star))
                        <input class="btn btn-confirm" type="submit" value="Modifier">
                    @else
                        <input class="btn btn-confirm" type="submit" value="Créer">
                    @endif
                </div>
            </form>
            
        </section>

@endsection