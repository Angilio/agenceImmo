@extends('admin.base')

@section('title', 'Contactez-nous')

@section('content')
<div>
    <h1>Agence Lorem ipsum.</h1>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere reiciendis enim nisi optio. Et culpa ratione nulla quae labore iste, alias, dolor, iure repellat dicta a fugiat id tenetur enim!</p>
</div>

<div>
    <h2>Contactez-Nous</h2>
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
    <form action="{{ route('contact.send') }}" method="post">
        @csrf

        {{-- Nom --}}
        @include('shared.input', [
            'label' => 'Nom',
            'class' => 'mt-3 w-100',
            'name' => 'name',
            'value' => old('name', Auth::check() ? Auth::user()->name : '')
        ])

        {{-- E-mail --}}
        @include('shared.input', [
            'type' => 'email',
            'label' => 'E-mail',
            'class' => 'mt-3 w-100',
            'name' => 'email',
            'value' => old('email', Auth::check() ? Auth::user()->email : '')
        ])

        {{-- Message --}}
        @include('shared.input', [
            'label' => 'Message',
            'type' => 'textarea',
            'class' => 'mt-3 w-100',
            'name' => 'message'
        ])

        <div class="d-flex justify-content-end">
            <button type="submit" class="mt-4 btn btn-primary">Envoyer le message ou commentaire</button>
        </div>
    </form>
</div>
@endsection
