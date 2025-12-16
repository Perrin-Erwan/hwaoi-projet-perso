<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Modifier {{ $personnage->nom }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-4">
        
        <p>
            <a href="{{ route('personnage.show', ['personnage' => $personnage->nom]) }}" class="btn btn-outline-secondary mb-3">
                ← Annuler et retourner à la fiche
            </a>
        </p>
        
        <h1 class="mb-4">Modifier : {{ $personnage->nom }}</h1>

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire d'Édition --}}
        <form method="POST" action="{{ route('personnage.update', ['personnage' => $personnage->nom]) }}">
            @csrf
            {{-- Directive pour simuler la méthode PATCH --}}
            @method('PUT') 

            <div class="row">
                
                {{-- Nom --}}
                <div class="mb-3 col-md-6">
                    <label for="nom" class="form-label">Nom Complet</label>
                    <input type="text" class="form-control" id="nom" name="nom" 
                           value="{{ old('nom', $personnage->nom) }}" required>
                </div>

                {{-- Alias --}}
                <div class="mb-3 col-md-6">
                    <label for="alias" class="form-label">Alias</label>
                    <input type="text" class="form-control" id="alias" name="alias" 
                           value="{{ old('alias', $personnage->alias) }}">
                </div>

                {{-- Description Courte --}}
                <div class mb-3 col-12">
                    <label for="description_courte" class="form-label">Description Courte</label>
                    <input type="text" class="form-control" id="description_courte" name="description_courte" 
                           value="{{ old('description_courte', $personnage->description_courte) }}">
                </div>

                {{-- Description Longue --}}
                <div class="mb-3 col-12">
                    <label for="description" class="form-label">Description Détaillée</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $personnage->description) }}</textarea>
                </div>

                <div class="mb-3 col-md-4">
                <label for="role" class="form-label">Peuple d'Origine</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="">Sélectionnez un Peuple</option>
                    
                    @php
                        // Définissez ici la liste des peuples connus de votre jeu
                        $peuples = ['Hylien', 'Zora', 'Goron', 'Soneau', 'Gerudo', 'Piaf', 'Golem', 'Korogu','Autre'];
                        $valeurActuelle = old('role', $personnage->role);
                    @endphp

                    @foreach ($peuples as $peuple)
                        <option value="{{ $peuple }}" {{ $valeurActuelle == $peuple ? 'selected' : '' }}>
                            {{ $peuple }}
                        </option>
                    @endforeach
                    
                </select>
            </div>

                {{-- Cœurs de Base --}}
                <div class="mb-3 col-md-4">
                    <label for="coeurs_base" class="form-label">Cœurs de Base</label>
                    <input type="number" class="form-control" id="coeurs_base" name="coeurs_base" 
                           value="{{ old('coeurs_base', $personnage->coeurs_base) }}" required min="1">
                </div>

                {{-- Arme Principale --}}
                <div class="mb-3 col-md-4">
                    <label for="arme_principale" class="form-label">Arme Principale</label>
                    <input type="text" class="form-control" id="arme_principale" name="arme_principale" 
                           value="{{ old('arme_principale', $personnage->arme_principale) }}" required>
                </div>
                
                {{-- Élément --}}
                <div class="mb-3 col-md-4">
                    <label for="element" class="form-label">Élément Associé</label>
                    <input type="text" class="form-control" id="element" name="element" 
                           value="{{ old('element', $personnage->element) }}">
                </div>
                
            </div>

            <button type="submit" class="btn btn-primary mt-3">Sauvegarder les Modifications</button>
            
        </form>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>