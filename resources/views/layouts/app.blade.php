<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hyrule Warriors: Chroniques du Sceau - @yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body { background-color: #f8f9fa; }
        .navbar-custom {
            background-color: #343a40; 
            border-bottom: 3px solid #ffc107; 
        }
        .navbar-custom .nav-link, .navbar-custom .navbar-brand { color: #ffffff; }
        .navbar-custom .nav-link:hover { color: #ffc107; }
        .container { margin-top: 20px; }
        .auth-links a { color: white; text-decoration: none; margin-left: 15px; font-size: 0.9rem; }
        .auth-links a:hover { color: #ffc107; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="/">⚔️ Chroniques du Sceau</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('personnage.list') }}">Guerriers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('combat-styles.index') }}">Styles de Combat</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('technique-individuelles.index') }}">Techniques</a></li>
                </ul>

                <div class="auth-links d-flex align-items-center">
                    @auth
                        <span class="text-white-50 me-3">Salut, {{ Auth::user()->name }}</span>
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                Déconnexion
                            </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Connexion</a>
                        <a href="{{ route('register') }}">Inscription</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>