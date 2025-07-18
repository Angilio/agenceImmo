<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href={{asset('assets/normalize.css')}}>
    <link rel="stylesheet" href={{asset('assets/app.css')}}>
    <link rel="stylesheet" href={{asset('assets/bootstrap.min.css')}}>
    <script src={{asset('assets/bootstrap.bundle.min.js')}}></script>
    <script src={{asset('assets/jquery-3.4.1.min.js')}}></script>
    <script src={{asset('assets/menu.js')}}></script>
    <script src={{asset('assets/chart.min.js')}}></script>
    <link rel="stylesheet" href="{{ asset('assets/fontawsome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/icons/css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href={{asset('assets/app.css')}}>
    <link href={{asset('assets/filepond.css')}} rel="stylesheet">
    <script rel="stylesheet" src={{asset('assets/filepond.js')}}></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-...==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <header>
        @include('layouts.components.sideBar')
    </header>
    <div id="contenu" class="container-fluid mt-5">
        @yield('content')
    </div>
    @include('layouts.components.footer')
</body>
</html>