<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des Personnages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-4">
        
       <div class="container mt-4">
    <h1 class="mb-4 text-center text-primary">Liste Complète de tous les Guerriers</h1>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('personnage.accueil') }}" class="btn btn-outline-secondary">
            ← Retour à l'Accueil
        </a>
        </div>
    
    {{-- ... Le reste de votre code pour afficher la liste complète est correct --}}
    
</div>

        {{-- SECTION D'INTRODUCTION ET DE PRÉSENTATION --}}
        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-10 px-0">
                <h2 class="display-4 fst-italic">Les Guerriers de l'ère du sceau</h2>
                <p class="lead my-3">
                    Découvrez la liste complète des guerriers disponibles dans ce chapitre épique. 
                    De puissants Sages aux figures historiques, chaque personnage apporte des compétences et des éléments uniques pour façonner le destin du royaume.
                </p>
                <p class="lead mb-0">
                    <span class="text-warning me-2">⭐</span>
                    Retrouvez notamment les figures centrales : 
                    Zelda, le Roi Rauru, les sages et d'autres personnages emblématiques de ce jeu.
                </p>
            </div>
        </div>
        
        {{-- LIEN VERS LE SYSTÈME DE JEU --}}
        <div class="mb-4 d-flex justify-content-end">
            <a href="{{ route('systeme-jeu') }}" class="btn btn-info text-white shadow-sm">
                 Explorer le Système de Jeu
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        {{-- DÉBUT DE LA LISTE DES PERSONNAGES --}}
        @if ($personnages->count() > 0)
            <div class="row">
                @foreach ($personnages as $personnage)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $personnage->nom }} ({{ $personnage->alias ?? 'Guerrier' }})</h5>
                                <p class="card-text small text-muted">
                                    Peuple : {{ $personnage->role ?? 'N/A' }}
                                </p>
                                <p class="card-text">
                                    Cœurs : <span class="badge bg-danger">{{ $personnage->coeurs_base }}</span> | 
                                    Arme principale : {{ $personnage->arme_principale }}
                                    <br>Description : {{ Str::limit($personnage->description_courte, 100) }}
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
        {{-- FIN DE LA LISTE DES PERSONNAGES --}}

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>