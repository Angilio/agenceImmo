@extends('admin.admin')
@section('title', $property->title)
@section('content')
    <div>    
        <div class="d-flex gap-2 justify-content-between flex-column flex-lg-row">
            <div>
                @php
                    $images = json_decode($property->images, true) ?? [];
                @endphp

                @if(count($images) > 0)
                    <div id="carouselProperty" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($images as $index => $image)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img id="showImg" src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Image du bien">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProperty" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselProperty" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @else
                    <p>Aucune image disponible</p>
                @endif
            </div>
            <form action="{{ route('property.contact.send', $property) }}" method="post" >
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h2>Interessé par ce bien? Contactez-Nous</h2>
                @csrf
                @method('post')
                @include('shared.input' , ['label' => 'Nom','class' => 'mt-3 w-100 ', 'name'=> 'name','value' => old('email', Auth::check() ? Auth::user()->name : '')])
                @include('shared.input' , ['label' => 'Prénoms','class' => 'mt-3 w-100', 'name'=> 'firstName'])
                @include('shared.input' , ['label' => 'Telephone','class' => 'mt-3 w-100', 'name'=> 'mobile'])
                @include('shared.input' , ['type' => 'email','label' => 'E-mail','class' => 'mt-3 w-100', 'name'=> 'email','value' => old('email', Auth::check() ? Auth::user()->email : '')])
                @include('shared.input' , ['label' => 'Message','type' => 'textarea','class' => 'mt-3 w-100', 'name'=> 'message'])
                <button class=" mt-4 btn btn-primary text-end" type="submit">Envoyer le message</button>
            </form>
        </div>
    </div>
    <div>
        <h2>{{ $property->title }}</h2>
        <p class="mt-0">{{ $property->Description }}</p>
        <p>Disponibilité: {{ ($property->Sold == 1) ? 'Non' : 'Oui'}} </p>
        <p>{{ $property->quartier->name }} - {{ $property->Surface }} m2</p>
        <p class="fw-bold text-success">Prix : {{ number_format($property->price, thousands_separator: ' ')}} Ar</p>
        <p>{{ $property->type_bien->name }} : {{ ($property->type_vente_id == 1) ? 'À louer' : 'À vendre'}}</p>
    </div>
@endsection