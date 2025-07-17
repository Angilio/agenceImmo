@extends('admin.admin')

@section('title', $bien->exists ? 'Modifier un bien' : 'Créer un bien')

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{  $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1 class="texte-info">{{ $bien->exists ? 'Modifier un bien' : 'Publier un bien' }}</h1>

<form action="{{ route($bien->exists ? 'admin.bien.update' : 'admin.bien.store', $bien) }}" method="post" id="form" class="vstack gap-2 w-100" enctype="multipart/form-data">
    @csrf
    @method($bien->exists ? 'put' : 'post')

    <!-- 🧱 Section 1 : Infos du bien -->
    <div class="border p-3 rounded mb-3">
        <h5 class="mb-3 text-primary">Infos du bien</h5>
        <div class="row">
            @include('shared.input' , ['label' => 'Titre','class' => 'col-12 col-md-6', 'name'=> 'title', 'value'=> $bien->title])
            <div class="col-12 col-md-6 row">
                @include('shared.input' , ['type' => 'number','class' => 'col-12 col-md-6', 'name'=> 'Surface', 'value'=> $bien->Surface])
                @include('shared.input' , ['type' => 'number','class' => 'col-12 col-md-6', 'name'=> 'price', 'value'=> $bien->price])
            </div>
        </div>
        @include('shared.input' , ['type' => 'textarea','class' => 'col-12', 'name'=> 'Description', 'value'=> $bien->Description])
    </div>

    <!-- 📍 Section 2 : Coordonnées géographiques -->
    <div class="border p-3 rounded mb-3">
        <h5 class="mb-3 text-success">Coordonnées géographiques</h5>
        <div class="row">
            @include('shared.input' , ['type' => 'text','class' => 'col-12 col-md-6', 'label' => 'Latitude', 'name'=> 'latitude', 'value'=> $bien->latitude])
            @include('shared.input' , ['type' => 'text','class' => 'col-12 col-md-6', 'label' => 'Longitude', 'name'=> 'longitude', 'value'=> $bien->longitude])
        </div>
    </div>

    <!-- ⚙️ Section 3 : Types et Spécifications -->
    <div class="border p-3 rounded mb-3">
        <h5 class="mb-3 text-info">Types & Spécifications</h5>
        <div class="row">
            @include('shared.selectType' , ['class' => 'col-12 col-md-6', 'name'=> 'TypeBien', 'value'=> $bien->type_bien_id])
            @include('shared.select' , ['class' => 'col-12 col-md-6', 'name'=> 'Quartier', 'value'=> $bien->quartier])
        </div>

        <div class="row mt-3">
            <div class="col-12 col-md-6 mb-3 form-group">
                <label for="images">Image du bien</label>
                <input type="file" class="form-control" name="images[]" id="images" multiple>
            </div>
            @include('shared.selectVente' , ['label' => 'Vente ou Location','class' => 'col-12 col-md-6 mt-4', 'name'=> 'type_vente_id', 'value'=> $bien->type_vente_id])
        </div>

        <div class="mt-2">
            @include('shared.checkbox' , ['label' => 'Vendu?','class' => 'col-12', 'name'=> 'Sold', 'postal_code'=> $bien->sold]) 
        </div>
    </div>

    <!-- 📤 Bouton -->
    <div class="mt-3">
        <button class="btn btn-primary w-100">
            {{ $bien->exists ? 'Modifier' : 'Créer' }}
        </button>
    </div>
</form>

<!-- Script FilePond -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        FilePond.create(document.querySelector('#images'), {
            allowMultiple: true,
            storeAsFile: true
        });
    });
</script>
@endsection
