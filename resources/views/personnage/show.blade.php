@extends('layouts.app')

@section('title', 'Fiche détaillée : ' . $personnage->nom)

@section('styles')
<style>
    .card-img-top {
        max-height: 500px;
        object-fit: contain;
        background-color: #f8f9fa;
    }
    /* Styles pour la sélection d'arme dynamique */
    .arme-selectable:hover {
        cursor: pointer;
        background-color: #f0f0f0;
    }
    .arme-selectable.active {
        border: 2px solid #0d6efd; /* Bordure bleue pour l'arme sélectionnée */
    }
</style>
@endsection

@section('content')

<div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">{{ $personnage->nom }} ({{ $personnage->alias ?? 'Guerrier' }})</h1>
        
        {{-- Boutons d'édition et retour --}}
        <div class="d-flex">
           <a href="{{ route('personnage.edit', $personnage->nom) }}" class="btn btn-warning me-2">
                Modifier la Fiche
            </a>
            <a href="{{ route('personnage.list') }}" class="btn btn-outline-secondary">
                ← Retour à la liste
            </a>
        </div>
    </div>
    
    <div class="row">

        {{-- COLONNE 1 : IMAGE --}}
        @if ($personnage->image_path)
            <div class="col-md-7 mb-4">
                <div class="card shadow-lg h-100">
                    <img src="{{ asset('images/personnages/' .$personnage->image_path) }}" 
                         class="card-img-top img-fluid" 
                         alt="Image de {{ $personnage->nom }}">
                </div>
            </div>
        @endif

        {{-- COLONNE 2 : DESCRIPTION ET CARACTÉRISTIQUES --}}
        <div class="col-md-{{ $personnage->image_path ? '5' : '12' }}">
            <div class="card shadow-sm h-100 mb-4">
                <div class="card-header bg-primary text-white">
                    Informations Générales
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $personnage->description }}</p>

                        {{-- INFOS STATIQUES --}}
                        <li class="list-group-item mt-3"><strong>Arme par défaut :</strong> {{ $personnage->arme_principale }}</li>
                        <li class="list-group-item"><strong>Peuple d'Origine :</strong> {{ $personnage->role ?? 'N/A' }}</li> 
                        <li class="list-group-item"><strong>Élément personnel :</strong> <span class="badge bg-info text-dark">{{ $personnage->element ?? 'Physique' }}</span></li>
                        <li class="list-group-item">
                            <strong>Style de Combat :</strong> 
                            <span class="badge bg-secondary">{{ $personnage->combatStyle?->nom ?? 'Non défini' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    
    {{-- ======================================================= --}}
    {{-- SECTION ARMES UTILISABLES (Clic pour équiper) --}}
    {{-- ======================================================= --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            Armes utilisables ({{ $personnage->armesUtilisables()->count() ?? 0 }}) - Cliquez pour Équiper
        </div>
        <div class="card-body">
            
            @if($personnage->armesUtilisables()->count() > 0)
                    <div class="list-group">
                        {{-- Boucle sur la collection d'armes utilisables --}}
                        @foreach ($personnage->armesUtilisables() as $arme)
                            <div class="list-group-item list-group-item-action arme-selectable" 
                                 data-puissance="{{ $arme->puissance_base ?? 0 }}" 
                                 data-arme-nom="{{ $arme->nom }}">
                                <div class="d-flex w-100 justify-content-between align-items-center">
                                    <h5 class="mb-1">{{ $arme->nom }}</h5>
                                    
                                    {{-- Affichage du statut Unique/Générique --}}
                                    @if ($arme->personnage_id == $personnage->id)
                                        <span class="badge bg-warning text-dark">Arme Unique</span>
                                    @else
                                        <span class="badge bg-secondary">Arme Générique</span>
                                    @endif
                            </div>
                            <p class="mb-1">
                                Puissance : <span class="badge bg-danger">{{ $arme->puissance_base ?? '?' }}</span> | 
                                Type : <span class="badge bg-info text-dark">{{ $arme->type }}</span>
                                @if ($arme->element)
                                    | Élément : <span class="badge bg-primary">{{ $arme->element }}</span>
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="mb-0">Ce personnage n'a pas d'armes spécifiques enregistrées.</p>
            @endif
            
        </div>
    </div>


    <div class="row mt-4">
        
        {{-- COLONNE 1 : TECHNIQUES INDIVIDUELLES --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-warning text-dark">
                    Techniques Individuelles ({{ $personnage->techniquesIndividuelles->count() }})
                </div>
                <div class="card-body">
                    @if($personnage->techniquesIndividuelles->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($personnage->techniquesIndividuelles as $technique)
                                <li class="list-group-item">
                                    <strong>{{ $technique->nom }}</strong>
                                    @if ($technique->dégâts)
                                        <span class="badge bg-danger ms-2">Dégâts : {{ $technique->dégâts }}</span>
                                    @endif
                                    <p class="small text-muted mb-0">{{ $technique->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">Aucune technique individuelle spéciale répertoriée.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- COLONNE 2 : OBJETS --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-secondary text-white">
                    Objets (Inventaire)
                </div>
                <div class="card-body">
                    {{-- Nécessite la relation "objets()" dans Personnage.php --}}
                    @if (method_exists($personnage, 'objets') && $personnage->objets->count() > 0)
                        <ul class="list-group list-group-flush">
                            {{-- Boucle sur la relation 'objets' --}}
                            @foreach ($personnage->objets as $objet)
                                <li class="list-group-item">
                                    <strong>{{ $objet->nom }}</strong>
                                    <p class="small text-muted mb-0">{{ $objet->description ?? 'Pas de description.' }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">Ce personnage n'a pas d'objets enregistrés dans son inventaire.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        
        {{-- COLONNE 1 : ARTÉFACTS SONEAUX (NOUVEAU) --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-info text-white">
                    Artéfacts Soneaux
                </div>
                <div class="card-body">
                    {{-- Nécessite la relation "artefactsSoneaux()" dans Personnage.php --}}
                    @if (method_exists($personnage, 'artefactsSoneaux') && $personnage->artefactsSoneaux->count() > 0)
                        <ul class="list-group list-group-flush">
                            {{-- Boucle sur la relation 'artefactsSoneaux' --}}
                            @foreach ($personnage->artefactsSoneaux as $artefact)
                                <li class="list-group-item">
                                    <strong>{{ $artefact->nom }}</strong>
                                    <p class="small text-muted mb-0">Type : {{ $artefact->type ?? 'N/A' }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">Aucun Artéfact Soneau répertorié pour ce personnage.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- COLONNE 2 : ATTAQUES AMALGAMÉES --}}
        <div class="col-md-6 mb-4">
             <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white">
                    Attaques Amalgamées (Combos)
                </div>
                <div class="card-body">
                    {{-- Nécessite la relation "attaquesAmalgamees()" dans Personnage.php --}}
                    @if (method_exists($personnage, 'attaquesAmalgamees') && $personnage->attaquesAmalgamees->count() > 0)
                        <ul class="list-group list-group-flush">
                            {{-- Boucle sur la relation 'attaquesAmalgamees' --}}
                            @foreach ($personnage->attaquesAmalgamees as $amalgame)
                                <li class="list-group-item">
                                    <strong>{{ $amalgame->nom }}</strong>
                                    <p class="small text-muted mb-0">Dégâts : {{ $amalgame->dégâts ?? 'N/A' }} | Type : {{ $amalgame->type ?? 'N/A' }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">Aucune attaque amalgamée/combo spéciale répertoriée.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    {{-- ======================================================= --}}
    {{-- SECTION ATTAQUES SYNCHRO (Existant) --}}
    {{-- ======================================================= --}}
    <div class="row mt-4">

        {{-- COLONNE 1 : ATTAQUES SYNCHRO INITIÉES --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-danger text-white">
                    Attaques Synchro spéciales ({{ $personnage->attaquesSynchro->count() }})
                </div>
                <div class="card-body">
                    @if($personnage->attaquesSynchro->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($personnage->attaquesSynchro as $attaque)
                                <li class="list-group-item">
                                    <strong>{{ $attaque->nom }}</strong> 
                                    
                                    @if (strtolower($attaque->type) === 'special')
                                        <span class="badge bg-warning text-dark ms-2">Spéciale</span>
                                    @else
                                        <span class="badge bg-secondary ms-2">Normale</span>
                                    @endif
                                    
                                    <span class="badge bg-primary ms-2">Partenaire: {{ $attaque->partenaire }}</span>
                                    <p class="small text-muted mb-0">{{ $attaque->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">Aucune attaque synchronisée répertoriée pour ce personnage.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- COLONNE 2 : ATTAQUES DE SYNERGIE EN TANT QUE PARTENAIRE --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-info text-dark">
                    Attaques synchro normales ({{ $personnage->attaquesSynchroEnPartenariat->count() }})
                </div>
                <div class="card-body">
                    @if($personnage->attaquesSynchroEnPartenariat->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($personnage->attaquesSynchroEnPartenariat as $attaque)
                                <li class="list-group-item">
                                    <strong>{{ $attaque->nom }}</strong> 
                                    
                                    @if (strtolower($attaque->type) === 'special')
                                        <span class="badge bg-warning text-dark ms-2">Spéciale</span>
                                    @else
                                        <span class="badge bg-secondary ms-2">Normale</span>
                                    @endif
                                    
                                    <span class="badge bg-danger ms-2">Initiée par:  {{ $attaque->personnage?->nom ?? 'Inconnu' }}</span>
                                    
                                    <p class="small text-muted mb-0">
                                        Description: {{ $attaque->description }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">Ce personnage n'est partenaire dans aucune attaque synchronisée répertoriée.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    {{-- SECTION NAVIGATION --}}
    <div class="mt-5 mb-5">
        <div class="d-flex justify-content-between">
            
            {{-- Bouton Précédent --}}
            @if (isset($previousPersonnage) && $previousPersonnage)
                <a href="{{ route('personnage.show', $previousPersonnage->nom) }}" class="btn btn-outline-primary">
                    ← {{ $previousPersonnage->nom }}
                </a>
            @else
                <button class="btn btn-outline-secondary disabled">
                    Début de la liste
                </button>
            @endif

            {{-- Bouton Suivant --}}
            @if (isset($nextPersonnage) && $nextPersonnage)
                <a href="{{ route('personnage.show', $nextPersonnage->nom) }}" class="btn btn-primary">
                    {{ $nextPersonnage->nom }} →
                </a>
            @else
                <button class="btn btn-outline-secondary disabled">
                    Fin de la liste
                </button>
            @endif
        </div>
    </div>

</div> 
@endsection