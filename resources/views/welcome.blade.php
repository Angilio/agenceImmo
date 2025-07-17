@extends('admin.base')
@section('title', 'Les 4 derniers biens')
@section('content')
    <div>
        <h1>Agence Lorem ipsum.</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere reiciendis enim nisi optio. Et culpa ratione nulla quae labore iste, alias, dolor, iure repellat dicta a fugiat id tenetur enim!</p>
    </div>
    <div>
        <h2>Nos derniers biens</h2>
        <div class="d-flex justify-content-between flex-column flex-lg-row gap-2">
            @foreach ($biens as $bien)
                <div class="">
                    @include('shared.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection