@extends('layouts.app')

@section('title', 'Guerrier : ' . $personnage->nom)

@section('content')
<div class="warriors-page py-4">
    <div class="container">
        
        {{-- NAVIGATION HAUT --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('personnage.list') }}" class="btn btn-warriors-outline">
                <i class="fas fa-chevron-left me-2"></i> Archives Royales
            </a>
            <div class="d-flex">
                <a href="{{ route('personnage.edit', $personnage->nom) }}" class="btn btn-soneau-sm me-2">
                    <i class="fas fa-edit"></i> Modifier
                </a>
            </div>
        </div>

        {{-- BANNIÈRE DE TITRE --}}
        <div class="char-header-banner mb-5">
            <h1 class="display-4 fw-bold text-uppercase m-0">{{ $personnage->nom }}</h1>
            <div class="h5 text-turquoise italic">{{ $personnage->alias ?? 'Guerrier de l\'ère du Sceau' }}</div>
        </div>

        <div class="row g-4">
            {{-- PORTRAIT DU GUERRIER --}}
            @if ($personnage->image_path)
                <div class="col-lg-6">
                    <div class="portrait-frame shadow-lg">
                        <img src="{{ asset('images/personnages/' .$personnage->image_path) }}" 
                             class="img-fluid main-portrait" alt="{{ $personnage->nom }}">
                        <div class="frame-decoration top-left"></div>
                        <div class="frame-decoration bottom-right"></div>
                    </div>
                </div>
            @endif

            {{-- INFOS GÉNÉRALES --}}
            <div class="col-lg-{{ $personnage->image_path ? '6' : '12' }}">
                <div class="info-card h-100">
                    <div class="info-header">FICHE D'IDENTITÉ</div>
                    <div class="p-4">
                        <p class="description-text mb-4">{{ $personnage->description }}</p>
                        
                        <div class="stats-grid">
                            <div class="stat-item">
                                <span class="label text-uppercase">Arme par défaut</span>
                                <span class="value text-turquoise">{{ $personnage->arme_principale }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="label text-uppercase">Peuple</span>
                                <span class="value">{{ $personnage->role ?? 'N/A' }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="label text-uppercase">Élément</span>
                                <span class="value badge-element px-2">{{ $personnage->element ?? 'Physique' }}</span>
                            </div>
                            <div class="stat-item">
                                <span class="label text-uppercase">Style de Combat</span>
                                <span class="value italic">{{ $personnage->combatStyle?->nom ?? 'Non défini' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION ARMES ET TECHNIQUES --}}
        <div class="row mt-5 g-4">
            {{-- ARMES UTILISABLES --}}
            <div class="col-md-6">
                <div class="sub-card h-100">
                    <div class="sub-header bg-green text-uppercase">
                        <i class="fas fa-khanda me-2"></i> Armes utilisables ({{ $personnage->armesUtilisables()->count() }})
                    </div>
                    <div class="p-3">
                        @forelse ($personnage->armesUtilisables() as $arme)
                            <div class="list-item-custom mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">{{ $arme->nom }}</span>
                                    <span class="badge {{ $arme->personnage_id == $personnage->id ? 'bg-warning text-dark' : 'bg-secondary' }} small">
                                        {{ $arme->personnage_id == $personnage->id ? 'Unique' : 'Générique' }}
                                    </span>
                                </div>
                                <div class="small opacity-75">
                                    ATK: <span class="text-danger">{{ $arme->puissance_base ?? '?' }}</span> | Type: {{ $arme->type }}
                                </div>
                            </div>
                        @empty
                            <p class="text-muted italic text-center py-3">Aucune arme spécifique.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- TECHNIQUES INDIVIDUELLES --}}
            <div class="col-md-6">
                <div class="sub-card h-100 border-warning">
                    <div class="sub-header bg-warning text-dark text-uppercase fw-bold">
                        <i class="fas fa-bolt me-2"></i> Techniques Individuelles
                    </div>
                    <div class="p-3">
                        @forelse ($personnage->techniquesIndividuelles as $technique)
                            <div class="list-item-custom mb-3 border-start border-warning border-3 ps-3">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold text-warning">{{ $technique->nom }}</span>
                                    @if ($technique->dégâts) <span class="badge bg-danger">DMG {{ $technique->dégâts }}</span> @endif
                                </div>
                                <p class="small mb-0 text-white-50">{{ $technique->description }}</p>
                            </div>
                        @empty
                            <p class="text-muted text-center py-3">Aucune technique spéciale.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION OBJETS & ARTÉFACTS --}}
        <div class="row mt-4 g-4">
            {{-- INVENTAIRE OBJETS --}}
            <div class="col-md-6">
                <div class="sub-card h-100">
                    <div class="sub-header bg-secondary text-uppercase">
                        <i class="fas fa-box-open me-2"></i> Inventaire d'Objets
                    </div>
                    <div class="p-3">
                        @if (method_exists($personnage, 'objets') && $personnage->objets->count() > 0)
                            @foreach ($personnage->objets as $objet)
                                <div class="list-item-custom mb-2">
                                    <div class="fw-bold text-white">{{ $objet->nom }}</div>
                                    <div class="small text-white-50">{{ $objet->description }}</div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted text-center py-3">Aucun objet enregistré.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ARTÉFACTS SONEAUX --}}
            <div class="col-md-6">
                <div class="sub-card h-100">
                    <div class="sub-header bg-info text-dark text-uppercase fw-bold">
                        <i class="fas fa-tools me-2"></i> Artéfacts Soneaux
                    </div>
                    <div class="p-3">
                        @if ($personnage->artefactsSoneaux && $personnage->artefactsSoneaux->count() > 0)
                            @foreach ($personnage->artefactsSoneaux as $artefact)
                                <div class="list-item-custom mb-2 border-start border-info border-3 ps-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-bold text-info">{{ $artefact->nom }}</span>
                                        <span class="text-info small">Effet: {{ $artefact->effet }}</span>
                                    </div>
                                    <div class="small text-white-50">{{ $artefact->description }}</div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted text-center py-3">Aucun artéfact Soneau.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION ATTAQUES AMALGAMÉES (NEON STYLE) --}}
        @if ($personnage->attaquesAmalgamees->count() > 0)
        <div class="soneau-section mt-5 shadow-lg">
            <div class="soneau-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-hammer me-2"></i> CAPACITÉS D'AMALGAME SONEAU</span>
                <span class="badge bg-dark text-turquoise border border-turquoise">TECHNOLOGIE ANCIENNE</span>
            </div>
            <div class="row p-4 g-3">
                @foreach ($personnage->attaquesAmalgamees as $amalgame)
                    <div class="col-md-6">
                        <div class="amalgame-box">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge bg-secondary opacity-75">{{ $amalgame->arme_requise }}</span>
                                <span class="text-danger fw-bold">PUISSANCE: {{ $amalgame->degats }}</span>
                            </div>
                            <h5 class="text-turquoise text-uppercase fw-bold">{{ $amalgame->nom }}</h5>
                            <p class="small mb-0 italic text-white-50">{{ $amalgame->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- SECTION ATTAQUES SYNCHRO --}}
        <div class="row mt-5 g-4">
            {{-- SYNCHRO SPÉCIALES (ROUGE) --}}
            <div class="col-md-6">
                <div class="sub-card border-danger h-100 shadow">
                    <div class="sub-header bg-danger text-uppercase fw-bold">
                        <i class="fas fa-star me-2"></i> Attaques Synchro Spéciales
                    </div>
                    <div class="p-3">
                        {{-- Meneur --}}
                        @foreach ($personnage->attaqueSynchro ?? [] as $attaque)
                            @if(strtolower($attaque->type) === 'special')
                                <div class="synchro-item mb-3">
                                    <div class="text-danger fw-bold text-uppercase">{{ $attaque->nom }}</div>
                                    <div class="small mb-1"><i class="fas fa-link text-white-50"></i> Duo: {{ $personnage->nom }} & <span class="text-turquoise">{{ $attaque->partenaireRel->nom ?? '?' }}</span></div>
                                    <p class="small text-white-50 mb-0 italic">{{ $attaque->description }}</p>
                                </div>
                            @endif
                        @endforeach
                        {{-- Partenaire --}}
                        @foreach ($personnage->attaquesEnTantQuePartenaire ?? [] as $attaque)
                            @if(strtolower($attaque->type) === 'special')
                                <div class="synchro-item mb-3 border-start border-danger border-2 ps-2">
                                    <div class="text-danger fw-bold text-uppercase">{{ $attaque->nom }}</div>
                                    <div class="small mb-1"><i class="fas fa-link text-white-50"></i> Duo: <span class="text-turquoise">{{ $attaque->personnage->nom ?? '?' }}</span> & {{ $personnage->nom }}</div>
                                    <p class="small text-white-50 mb-0 italic">{{ $attaque->description }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- SYNCHRO NORMALES (BLEU) --}}
            <div class="col-md-6">
                <div class="sub-card border-info h-100 shadow">
                    <div class="sub-header bg-info text-dark text-uppercase fw-bold">
                        <i class="fas fa-sync-alt me-2"></i> Attaques Synchro Normales
                    </div>
                    <div class="p-3">
                        @foreach ($personnage->attaqueSynchro ?? [] as $attaque)
                            @if(strtolower($attaque->type) !== 'special')
                                <div class="synchro-item mb-3">
                                    <div class="text-info fw-bold text-uppercase">{{ $attaque->nom }}</div>
                                    <div class="small mb-1">Duo: {{ $personnage->nom }} & {{ $attaque->partenaireRel->nom ?? '?' }}</div>
                                    <p class="small text-white-50 mb-0 italic">{{ $attaque->description }}</p>
                                </div>
                            @endif
                        @endforeach
                        @foreach ($personnage->attaquesEnTantQuePartenaire ?? [] as $attaque)
                            @if(strtolower($attaque->type) !== 'special')
                                <div class="synchro-item mb-3 border-start border-info border-2 ps-2">
                                    <div class="text-info fw-bold text-uppercase">{{ $attaque->nom }}</div>
                                    <div class="small mb-1">Duo: {{ $attaque->personnage->nom ?? '?' }} & {{ $personnage->nom }}</div>
                                    <p class="small text-white-50 mb-0 italic">{{ $attaque->description }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- NAVIGATION BAS DE PAGE --}}
        <div class="d-flex justify-content-between mt-5 mb-5 pt-4 border-top border-secondary">
            @if (isset($previousPersonnage))
                <a href="{{ route('personnage.show', $previousPersonnage->nom) }}" class="btn btn-warriors-outline px-4">
                    <i class="fas fa-arrow-left me-2"></i> {{ $previousPersonnage->nom }}
                </a>
            @else
                <div class="btn btn-outline-secondary disabled">Début</div>
            @endif

            @if (isset($nextPersonnage))
                <a href="{{ route('personnage.show', $nextPersonnage->nom) }}" class="btn btn-warriors-outline px-4">
                    {{ $nextPersonnage->nom }} <i class="fas fa-arrow-right ms-2"></i>
                </a>
            @else
                <div class="btn btn-outline-secondary disabled">Fin</div>
            @endif
        </div>
    </div>
</div>

<style>
    /* --- THEME GLOBAL --- */
    body {
        background: radial-gradient(circle at center, #2b1d16 0%, #0c0c0c 100%) !important;
        background-attachment: fixed !important;
        color: #eee;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .text-turquoise { color: #2DFFD9 !important; }
    .italic { font-style: italic; }

    /* --- TITRE --- */
    .char-header-banner {
        background: linear-gradient(90deg, #8B0000 0%, transparent 100%);
        padding: 20px 40px;
        border-left: 8px solid #2DFFD9;
        clip-path: polygon(0 0, 95% 0, 100% 100%, 0% 100%);
    }

    /* --- PORTRAIT FRAME --- */
    .portrait-frame {
        position: relative;
        background: rgba(0,0,0,0.5);
        padding: 15px;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .main-portrait { width: 100%; max-height: 550px; object-fit: contain; }
    .frame-decoration { position: absolute; width: 40px; height: 40px; border: 4px solid #2DFFD9; }
    .top-left { top: -5px; left: -5px; border-right: 0; border-bottom: 0; }
    .bottom-right { bottom: -5px; right: -5px; border-left: 0; border-top: 0; }

    /* --- INFO CARDS --- */
    .info-card { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px); }
    .info-header { background: #8B0000; padding: 10px 20px; font-weight: bold; letter-spacing: 2px; }
    .description-text { font-size: 1.1rem; line-height: 1.6; color: #ccc; }
    .stats-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .stat-item { border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 8px; }
    .stat-item .label { display: block; font-size: 0.7rem; color: #888; letter-spacing: 1px; }
    .stat-item .value { font-size: 1.1rem; font-weight: bold; }
    .badge-element { background: #2DFFD9; color: #000; border-radius: 4px; font-weight: bold; font-size: 0.9rem; }

    /* --- SUB CARDS --- */
    .sub-card { background: rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1); overflow: hidden; }
    .sub-header { padding: 8px 15px; font-size: 0.85rem; letter-spacing: 1px; }
    .bg-green { background: #1a4a1a; }
    .list-item-custom { background: rgba(255,255,255,0.03); padding: 10px; border-radius: 4px; transition: 0.3s; }
    .list-item-custom:hover { background: rgba(255,255,255,0.08); }

    /* --- AMALGAME (SONEAU STYLE) --- */
    .soneau-section { border: 2px solid #2DFFD9; background: rgba(45, 255, 217, 0.05); }
    .soneau-header { background: #2DFFD9; color: #000; padding: 10px 20px; font-weight: bold; }
    .amalgame-box { background: rgba(0,0,0,0.6); padding: 15px; border-top: 1px solid rgba(45,255,217,0.3); height: 100%; }

    /* --- BUTTONS --- */
    .btn-warriors-outline { border: 1px solid #8B0000; color: white; text-transform: uppercase; font-weight: bold; }
    .btn-warriors-outline:hover { background: #8B0000; color: white; }
    .btn-soneau-sm { background: #2DFFD9; color: #000; border: none; font-weight: bold; padding: 5px 15px; border-radius: 4px; }
</style>
@endsection