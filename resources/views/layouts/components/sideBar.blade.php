<nav class="navbar navbar-expand-md navbar-light bg-primary p-2">
    <div class="container-fluid">

        {{-- LEFT SIDE: Home + Admin --}}
        <div class="d-flex align-items-center">
            {{-- HOME icon mobile --}}
            <a href="{{ route('home') }}" class="btn text-white d-md-none me-2">
                <i class="fas fa-home"></i>
            </a>
            {{-- HOME texte desktop --}}
            <a href="{{ route('home') }}" class="navbar-brand text-white d-none d-md-inline">Accueil</a>

            {{-- ADMIN dropdown --}}
            @role('Admin')
                <div class="dropdown ms-2">
                    <a class="btn text-white dropdown-toggle p-0" href="#" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-tools d-md-none fs-5"></i>
                        <span class="d-none d-md-inline">Admin</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.bien.index') }}">Gérer Biens</a></li>
                        <li><a class="dropdown-item" href="#">Clients</a></li>
                    </ul>
                </div>
            @endrole
        </div>

        {{-- BURGER (mobile only) --}}
        <button class="navbar-toggler ms-auto bg-light d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navMenuMobile">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MAIN NAV (desktop) --}}
        <div class="collapse navbar-collapse d-none d-md-flex" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('property.index') }}">Biens</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('biens.carte') }}">Vue sur une carte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('contact') }}">Contactez-nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('about') }}">À propos</a>
                </li>
            </ul>
        </div>

        {{-- PROFILE DROPDOWN always visible --}}
        <div class="dropdown ms-3">
            <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" href="#" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('assets/img_avatar6.png') }}" alt="Profil" class="rounded-circle" width="40">
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                @auth
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Éditer Profil</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Déconnecter</button>
                        </form>
                    </li>
                @else
                    <li><a class="dropdown-item" href="{{ route('login') }}">Connecter</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">Créer un compte</a></li>
                @endauth
            </ul>
        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div class="collapse d-md-none bg-primary px-3" id="navMenuMobile">
        <ul class="navbar-nav mt-2">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('property.index') }}">Biens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('biens.carte') }}">Vue sur une carte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('contact') }}">Contactez-nous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('about') }}">À propos</a>
            </li>
        </ul>
    </div>
</nav>
