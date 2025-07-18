@extends('admin.base')
@section('title', 'Les biens')
@section('content')
    <div>
        <h4>Cliquer sur un quartier de votre choix pour voir les bien disponible! Rechercher par Budget max et/ou Surface minimale et/ou Mot clé.</h4>
        {{-- @foreach ($quarts as $q => $s)
            <p>{{ $s }}</p>
        @endforeach --}}
        <div class="mt-3">
            <form action="" method="get" class="gap-2 d-flex justify-content-between flex-column flex-lg-row">
                <input type="number" placeholder="Budget max" name="price" class="form-control" value="{{ $input['price'] ?? '' }}">
                <input type="number" placeholder="Surface minimale" name="surface" class="form-control" value="{{ $input['surface'] ?? '' }}">
                <input type="text" placeholder="Mot clé" name="title" class="form-control" value="{{ $input['title'] ?? '' }}">

                <select name="quartier" class="form-control">
                    <option value="">Choisissez un quartier</option>
                    @foreach($quartiers as $quartier)
                        <option value="{{ $quartier->id }}"
                            {{ (isset($input['quartier']) && $input['quartier'] == $quartier->id) ? 'selected' : '' }}>
                            {{ $quartier->name }}
                        </option>
                    @endforeach
                </select>

                <button class="btn btn-primary">Rechercher</button>
            </form>
        </div>


        <h2>Tous nos biens</h2>
        <div class="row">
            @forelse ($biens as $bien)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    @include('shared.card')
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center mt-5 h2">Aucun bien correspond à votre recherche !</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection