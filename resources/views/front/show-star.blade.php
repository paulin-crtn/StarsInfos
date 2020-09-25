@extends('layouts.app')

@section('title')
    Fiche de {{ $star->firstname }} {{ $star->lastname }}
@endsection

@section('content')

        <section class="star-record">
            <div class="star-profile">
                @if (empty($star->photo) || !is_file('storage/'.$star->photo))
                    <div 
                    class="star-picture"
                    style="background-image: url({{ asset('storage/default_avatar.jpg') }});">
                    </div>
                @else
                    <div 
                    class="star-picture"
                    style="background-image: url({{ asset('storage/'.$star->photo) }});">
                    </div>
                @endif
                <div>
                    <h2>{{ $star->firstname }} {{ $star->lastname }}</h2>
                    <div class="buttons">
                        <a class="btn btn-dark" href="/">Retour</a>
                        <a class="btn btn-info" href="/manage-star/update/{{$star->id}}">Modifier</a>
                        <!-- Modal trigger -->
                        <div class="btn btn-danger" onclick="document.getElementById('modal-confirm').style.display='block'">Supprimer</div>
                    </div>
                </div>
            </div>
            <p class="star-description">{!! nl2br(e($star->description)) !!}</p><!-- Allow line breaks -->
        </section>

        <!-- Modal -->
        <div id="modal-confirm" class="modal">
            <div class="modal-content">
                <h1>Confirmer la suppression</h1>
                <p>Vous êtes sur le point de supprimer la fiche {{ $star->firstname }} {{ $star->lastname }}.</p>
                <div class="buttons">
                    <div class="btn btn-dark" onclick="document.getElementById('modal-confirm').style.display='none'">Annuler</div>
                    <a class="btn btn-danger" href="/manage-star/delete/{{$star->id}}">Supprimer</a>
                </div>
            </div>
        </div>

        <script>
            // Get the modal
            var modal = document.getElementById('modal-confirm');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script> 

@endsection