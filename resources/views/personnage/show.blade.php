@extends('layouts.app')

@section('title', 'Fiche détaillée : ' . $personnage->nom)

@section('styles')
<style>
    .card-img-top {
        max-height: 500px;
        object-fit: contain;
        background-color: #f8f9fa;
    }
    .arme-selectable:hover {
        cursor: pointer;
        background-color: #f0f0f0;
    }
    .arme-selectable.active {
        border: 2px solid #0d6efd;
    }
</style>
@endsection

@section('content')

<div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">{{ $personnage->nom }} ({{ $personnage->alias ?? 'Guerrier' }})</h1>
        
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
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Arme par défaut :</strong> {{ $personnage->arme_principale }}</li>
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
    
    {{-- SECTION ARMES UTILISABLES --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            Armes utilisables ({{ $personnage->armesUtilisables()->count() ?? 0 }})
        </div>
        <div class="card-body">
            @if($personnage->armesUtilisables()->count() > 0)
                <div class="list-group">
                    @foreach ($personnage->armesUtilisables() as $arme)
                        <div class="list-group-item list-group-item-action arme-selectable">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <h5 class="mb-1">{{ $arme->nom }}</h5>
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
        {{-- TECHNIQUES INDIVIDUELLES --}}
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

        {{-- OBJETS --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-secondary text-white">
                    Objets (Inventaire)
                </div>
                <div class="card-body">
                    @if (method_exists($personnage, 'objets') && $personnage->objets->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach ($personnage->objets as $objet)
                                <li class="list-group-item">
                                    <strong>{{ $objet->nom }}</strong>
                                    <p class="small text-muted mb-0">{{ $objet->description ?? 'Pas de description.' }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-0">Aucun objet enregistré.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ARTÉFACTS ET AMALGAMES --}}
   {{-- SECTION ARTÉFACTS SONEAUX --}}
<div class="col-md-6 mb-4">
    <div class="card shadow-sm h-100">
        <div class="card-header bg-info text-white fw-bold">
            <i class="fas fa-tools me-2"></i> Artéfacts Soneaux
        </div>
        <div class="card-body">
            @if ($personnage->artefactsSoneaux && $personnage->artefactsSoneaux->count() > 0)
                <div class="accordion" id="accordionSoneau">
                    @foreach ($personnage->artefactsSoneaux as $index => $artefact)
                        <div class="accordion-item mb-2 border">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                                    <div class="d-flex justify-content-between w-100 align-items-center">
                                        <span class="fw-bold">{{ $artefact->nom }}</span>
                                        <span class="badge bg-primary rounded-pill me-3">Puissance : {{ $artefact->effet }}</span>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" data-bs-parent="#accordionSoneau">
                                <div class="accordion-body small text-muted">
                                    {{ $artefact->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted my-3">Aucun artéfact soneau dans l'inventaire.</p>
            @endif
        </div>
    </div>
</div>
{{-- SECTION ATTAQUES AMALGAMÉES --}}
@if ($personnage->attaquesAmalgamees->count() > 0)
<div class="card shadow-sm border-dark mt-4">
    <div class="card-header bg-dark text-white fw-bold">
        <i class="fas fa-hammer me-2"></i> Capacité d'Amalgame Soneau
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($personnage->attaquesAmalgamees as $amalgame)
                <div class="col-md-6 mb-3">
                    <div class="p-3 border rounded bg-light h-100 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge bg-secondary">{{ $amalgame->arme_requise }}</span>
                            <span class="badge bg-danger">Puissance : {{ $amalgame->degats }}</span>
                        </div>
                        <h6 class="fw-bold text-primary mb-1">{{ $amalgame->nom }}</h6>
                        <p class="small text-muted mb-0"><em>{{ $amalgame->description }}</em></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
    
    {{-- ======================================================= --}}
    {{-- SECTION ATTAQUES SYNCHRO (COLONNE UNIQUE) --}}
    {{-- ======================================================= --}}
    {{-- ======================================================= --}}
    {{-- SECTION ATTAQUES SYNCHRO (SÉPARÉES PAR TYPE) --}}
    {{-- ======================================================= --}}
    <div class="row mt-4">

        {{-- COLONNE 1 : ATTAQUES SYNCHRO SPÉCIALES --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-danger text-white">
                    <i class="fas fa-star me-2"></i> Attaques Synchro Spéciales
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        {{-- On cherche les spéciales où il est meneur --}}
                        @foreach ($personnage->attaqueSynchro ?? [] as $attaque)
                            @if(strtolower($attaque->type) === 'special')
                                <li class="list-group-item">
                                    <h5 class="text-primary">{{ $attaque->nom }}</h5>
                                    <p class="mb-1"><strong>Duo :</strong> {{ $personnage->nom }} & {{ $attaque->partenaireRel->nom ?? 'Inconnu' }}</p>
                                    <p class="small text-muted mb-0">{{ $attaque->description }}</p>
                                </li>
                            @endif
                        @endforeach

                        {{-- On cherche les spéciales où il est partenaire --}}
                        @foreach ($personnage->attaquesEnTantQuePartenaire ?? [] as $attaque)
                            @if(strtolower($attaque->type) === 'special')
                                <li class="list-group-item border-start border-danger border-4">
                                    <h5 class="text-primary">{{ $attaque->nom }}</h5>
                                    <p class="mb-1"><strong>Duo :</strong> {{ $attaque->personnage->nom ?? 'Inconnu' }} & {{ $personnage->nom }}</p>
                                    <p class="small text-muted mb-0">{{ $attaque->description }}</p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        {{-- COLONNE 2 : ATTAQUES SYNCHRO NORMALES --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-info text-dark">
                    <i class="fas fa-sync me-2"></i> Attaques Synchro Normales
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        {{-- On cherche les normales où il est meneur --}}
                        @foreach ($personnage->attaqueSynchro ?? [] as $attaque)
                            @if(strtolower($attaque->type) !== 'special')
                                <li class="list-group-item">
                                    <h5 class="text-dark">{{ $attaque->nom }}</h5>
                                    <p class="mb-1"><strong>Duo :</strong> {{ $personnage->nom }} & {{ $attaque->partenaireRel->nom ?? 'Inconnu' }}</p>
                                    <p class="small text-muted mb-0">{{ $attaque->description }}</p>
                                </li>
                            @endif
                        @endforeach

                        {{-- On cherche les normales où il est partenaire --}}
                        @foreach ($personnage->attaquesEnTantQuePartenaire ?? [] as $attaque)
                            @if(strtolower($attaque->type) !== 'special')
                                <li class="list-group-item border-start border-info border-4">
                                    <h5 class="text-dark">{{ $attaque->nom }}</h5>
                                    <p class="mb-1"><strong>Duo :</strong> {{ $attaque->personnage->nom ?? 'Inconnu' }} & {{ $personnage->nom }}</p>
                                    <p class="small text-muted mb-0">{{ $attaque->description }}</p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
    
    {{-- SECTION NAVIGATION --}}
    <div class="mt-5 mb-5">
        <div class="d-flex justify-content-between">
            @if (isset($previousPersonnage) && $previousPersonnage)
                <a href="{{ route('personnage.show', $previousPersonnage->nom) }}" class="btn btn-outline-primary">
                    ← {{ $previousPersonnage->nom }}
                </a>
            @else
                <button class="btn btn-outline-secondary disabled">Début de la liste</button>
            @endif

            @if (isset($nextPersonnage) && $nextPersonnage)
                <a href="{{ route('personnage.show', $nextPersonnage->nom) }}" class="btn btn-primary">
                    {{ $nextPersonnage->nom }} →
                </a>
            @else
                <button class="btn btn-outline-secondary disabled">Fin de la liste</button>
            @endif
        </div>
    </div>
</div> 
@endsection