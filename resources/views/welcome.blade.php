@extends('admin.base')

@section('title', 'Les 4 derniers biens')

@section('content')
    <div>
        <h1>Bienvenue chez Agence Immo Diego</h1>
        <p>
            Depuis plus de 10 ans, Agence Immo Diego accompagne ses clients dans la recherche et la vente de biens immobiliers de qualité à Antsiranana et ses environs. 
            Notre équipe d'experts est dédiée à vous offrir un service personnalisé, que vous soyez acheteur, vendeur ou investisseur.
        </p>
    </div>
    <div>
        <h2>Nos derniers biens à la une</h2>
        <div class="row g-2">
            @foreach ($biens as $bien)
                <div class="col-12 col-lg-3">
                    @include('shared.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
