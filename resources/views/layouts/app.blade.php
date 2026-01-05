<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hyrule Warriors: Chroniques du Sceau - @yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #343a40; /* Dark background */
            border-bottom: 3px solid #ffc107; /* Gold/Yellow accent */
        }
        .navbar-custom .nav-link, .navbar-custom .navbar-brand {
            color: #ffffff; /* White text */
        }
        .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active {
            color: #ffc107; /* Gold/Yellow hover et couleur active */
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            {{-- CORRECTION 1: Utiliser la route nommée 'accueil' --}}
            <a class="navbar-brand" href="{{ route('personnage.accueil') }}">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('personnage.list') ? 'active' : '' }}" 
                           href="{{ route('personnage.list') }}">Guerriers</a>
                    </li>
                    <li class="nav-item">
                        {{-- Supposition : la route pour les styles de combat existe --}}
                        <a class="nav-link {{ request()->routeIs('combat-styles.index') ? 'active' : '' }}" 
                           href="{{ route('combat-styles.index') }}">Styles de Combat</a>
                    </li>
                    <li class="nav-item">
                        {{-- CORRECTION 2: Route plus cohérente avec le nom du modèle (TechniqueIndividuelle) --}}
                        <a class="nav-link {{ request()->routeIs('technique-individuelles.index') ? 'active' : '' }}" 
                           href="{{ route('technique-individuelles.index') }}">Techniques Individuelles</a>
                    </li>
                    <li class="nav-item">
                        {{-- Ajout de la page Système de Jeu --}}
                        <a class="nav-link {{ request()->routeIs('systeme-jeu') ? 'active' : '' }}" 
                           href="{{ route('systeme-jeu') }}">Règles de Jeu</a>
                    </li>
                    <li class="nav-item">
                        {{-- Ajout de la page Ennemis --}}
                        <a class="nav-link {{ request()->routeIs('ennemis.index') ? 'active' : '' }}" 
                           href="{{ route('ennemis.index') }}">Bestiaire</a>
                    </li>
                    <li class="nav-item">
                        {{-- Ajout de la page Amalgames --}}
                        <a class="nav-link {{ request()->routeIs('amalgames.index') ? 'active' : '' }}" 
                           href="{{ route('amalgames.index') }}">Amalgames</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        
        {{-- Affichage des messages de session --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>