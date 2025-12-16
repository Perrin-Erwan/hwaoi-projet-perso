<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil - Chronique de l'Héritage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-4">
        
        <h1 class="mb-4 text-center text-primary">Hyrule Warriors : les chroniques du sceau</h1>

        {{-- SECTION D'INTRODUCTION --}}
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-10 px-0">
                <h2 class="display-4 fst-italic">Découvrez les événements de la guerre de l'ère des légendes</h2>
                <p class="lead my-3">
                    Ce jeu relate l'histoire de la guerre du sceau. Entre pouvoir, maitrise des armes et peuple, on est servis.
                    Jouez plusieurs personnages au caractère différents et variés. Attaquez en duo pour plus de puissance !
                </p>
                <p class="lead mb-0">
                    <span class="text-warning me-2">⭐</span>
                    Explorez les personnages, ou plongez directement dans les règles de combat !
                </p>
            </div>
        </div>
        
        <div class="d-flex justify-content-between mb-4">
             {{-- Bouton pour la liste complète --}}
            <a href="{{ route('personnage.list') }}" class="btn btn-primary btn-lg shadow-sm">
                ➡️ Afficher TOUS les Guerriers
            </a>
            
             {{-- Bouton pour le Système de Jeu --}}
            <a href="{{ route('systeme-jeu') }}" class="btn btn-info text-white btn-lg shadow-sm">
                🔍 Système de Jeu
            </a>
        </div>
        
        <hr class="my-5">

        <h2 class="text-center mb-4">Aperçu de plusieurs Guerriers</h2>

        {{-- AFFICHAGE DES 3 PERSONNAGES ALÉATOIRES --}}
        @if ($personnagesAleatoires->count() > 0)
            <div class="row">
                @foreach ($personnagesAleatoires as $personnage)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg h-100">
                             {{-- Affichage de l'image si elle existe --}}
                            @if ($personnage->image_path)
                                <img src="{{ asset('images/personnages/' . $personnage->image_path) }}" 
                                     class="card-img-top" 
                                     alt="Image de {{ $personnage->nom }}" 
                                     style="height: 250px; object-fit: cover;">
                            @endif
                            
                            <div class="card-body">
                                <h5 class="card-title">{{ $personnage->nom }} ({{ $personnage->alias ?? 'Guerrier' }})</h5>
                                <p class="card-text small text-muted">
                                    Peuple : {{ $personnage->role ?? 'N/A' }}
                                </p>
                                <a href="{{ route('personnage.show', ['personnage' => $personnage->nom]) }}" class="btn btn-primary btn-sm mt-2">Voir la fiche détaillée</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning text-center" role="alert">
                Aucun personnage trouvé dans la base de données.
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>