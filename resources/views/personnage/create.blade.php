@extends('layouts.app')

@section('title', 'Enrôler un nouveau Guerrier')

@section('content')
<div class="warriors-page py-5">
    <div class="container">
        
        {{-- BOUTON RETOUR : Vers la liste puisque le personnage n'existe pas encore --}}
        <div class="mb-4">
            <a href="{{ route('personnage.list') }}" class="btn btn-warriors-outline">
                <i class="fas fa-arrow-left me-2"></i> Retour aux Archives
            </a>
        </div>
        
        {{-- TITRE DE LA FORGE --}}
        <div class="char-header-banner mb-5">
            <h1 class="display-5 fw-bold text-uppercase m-0">Nouvel Enrôlement</h1>
            <div class="h5 text-turquoise italic">Consignation d'un nouveau sujet dans le Sceau</div>
        </div>

        {{-- AFFICHAGE DES ERREURS --}}
        @if ($errors->any())
            <div class="alert bg-danger text-white border-0 shadow-lg mb-4">
                <div class="fw-bold mb-2"><i class="fas fa-exclamation-triangle me-2"></i> Erreurs de consignation :</div>
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULAIRE STYLISÉ --}}
        <div class="edit-card shadow-lg">
            {{-- Route vers store, méthode POST, et activation de l'upload d'image --}}
            <form method="POST" action="{{ route('personnage.store') }}" enctype="multipart/form-data" class="p-4 p-md-5">
                @csrf
                {{-- PAS DE @method('PUT') ICI --}}

                <div class="row g-4">
                    
                    {{-- Nom --}}
                    <div class="col-md-6">
                        <label for="nom" class="form-label-warriors">Nom Complet</label>
                        <input type="text" class="form-input-warriors" id="nom" name="nom" 
                               value="{{ old('nom') }}" placeholder="Ex: Link, Zelda..." required>
                    </div>

                    {{-- Alias --}}
                    <div class="col-md-6">
                        <label for="alias" class="form-label-warriors">Alias / Titre</label>
                        <input type="text" class="form-input-warriors" id="alias" name="alias" 
                               value="{{ old('alias') }}" placeholder="Ex: Le Héros du Temps">
                    </div>

                    {{-- IMAGE : Version simplifiée pour la création --}}
                    <div class="col-12 mt-4">
                        <label for="image" class="form-label-warriors text-turquoise">Illustration du Guerrier</label>
                        <div class="row align-items-center">
                            <div class="col-md-1 mb-3 mb-md-0 text-center">
                                <div class="rounded border border-secondary d-flex align-items-center justify-content-center" style="height: 60px; width: 60px; background: rgba(255,255,255,0.05)">
                                    <i class="fas fa-portrait text-muted"></i>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <input type="file" class="form-input-warriors" id="image" name="image">
                                <small class="text-muted mt-2 d-block italic">Format PNG ou JPG recommandé (max 2Mo).</small>
                            </div>
                        </div>
                    </div>

                    {{-- Description Courte --}}
                    <div class="col-12 mt-4">
                        <label for="description_courte" class="form-label-warriors">Accroche (Description Courte)</label>
                        <input type="text" class="form-input-warriors" id="description_courte" name="description_courte" 
                               value="{{ old('description_courte') }}" placeholder="Une phrase courte présentant le guerrier">
                    </div>

                    {{-- Description Longue --}}
                    <div class="col-12">
                        <label for="description" class="form-label-warriors">Histoire & Détails</label>
                        <textarea class="form-input-warriors" id="description" name="description" rows="5" placeholder="Racontez la légende de ce sujet..." required>{{ old('description') }}</textarea>
                    </div>

                    {{-- Peuple --}}
                    <div class="col-md-4">
                        <label for="role" class="form-label-warriors">Peuple d'Origine</label>
                        <select class="form-input-warriors form-select-warriors" id="role" name="role" required>
                            <option value="" disabled {{ old('role') ? '' : 'selected' }}>Choisir un peuple...</option>
                            @php
                                $peuples = ['Hylien', 'Zora', 'Goron', 'Soneau', 'Gerudo', 'Piaf', 'Golem', 'Korogu','Autre'];
                                $valeurSelectionnee = old('role');
                            @endphp
                            @foreach ($peuples as $peuple)
                                <option value="{{ $peuple }}" {{ $valeurSelectionnee == $peuple ? 'selected' : '' }}>
                                    {{ $peuple }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Cœurs --}}
                    <div class="col-md-4">
                        <label for="coeurs_base" class="form-label-warriors">Cœurs de Base</label>
                        <input type="number" class="form-input-warriors" id="coeurs_base" name="coeurs_base" 
                               value="{{ old('coeurs_base', 3) }}" required min="1">
                    </div>

                    {{-- Arme --}}
                    <div class="col-md-4">
                        <label for="arme_principale" class="form-label-warriors">Arme Principale</label>
                        <input type="text" class="form-input-warriors" id="arme_principale" name="arme_principale" 
                               value="{{ old('arme_principale') }}" placeholder="Master Sword, Arc de Lumière..." required>
                    </div>
                    
                    {{-- Élément --}}
                    <div class="col-md-4">
                        <label for="element" class="form-label-warriors">Élément Associé</label>
                        <input type="text" class="form-input-warriors" id="element" name="element" 
                               value="{{ old('element') }}" placeholder="Physique, Feu, Glace...">
                    </div>
                    
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-soneau px-5 py-3 fw-bold">
                        <i class="fas fa-plus-circle me-2"></i> ENRÔLER DANS LES ARCHIVES
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>

<style>
    /* --- THEME GLOBAL --- */
    body {
        background: radial-gradient(circle at center, #2b1d16 0%, #0c0c0c 100%) !important;
        background-attachment: fixed !important;
        color: #eee;
    }

    .text-turquoise { color: #2DFFD9 !important; }

    /* --- BANNIÈRE : Couleur différente pour marquer la création (Vert Soneau) --- */
    .char-header-banner {
        background: linear-gradient(90deg, #004d40 0%, transparent 100%);
        padding: 20px 40px;
        border-left: 8px solid #2DFFD9;
        clip-path: polygon(0 0, 95% 0, 100% 100%, 0% 100%);
    }

    /* --- CARTE DU FORMULAIRE --- */
    .edit-card {
        background: rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 10px;
    }

    /* --- LABELS ET INPUTS --- */
    .form-label-warriors {
        color: #888;
        text-transform: uppercase;
        font-size: 0.8rem;
        font-weight: bold;
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: block;
    }

    .form-input-warriors {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
        color: #fff !important;
        padding: 12px 15px;
        width: 100%;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .form-input-warriors:focus {
        outline: none;
        border-color: #2DFFD9 !important;
        box-shadow: 0 0 10px rgba(45, 255, 217, 0.2);
        background: rgba(255, 255, 255, 0.1) !important;
    }

    .form-select-warriors option {
        background: #1a1a1a;
        color: #fff;
    }

    /* --- BOUTONS --- */
    .btn-warriors-outline {
        border: 1px solid #004d40;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
    }
    .btn-warriors-outline:hover { background: #004d40; color: white; }

    .btn-soneau {
        background: #2DFFD9;
        color: #000;
        border: none;
        border-radius: 5px;
        transition: 0.3s;
        letter-spacing: 1px;
    }
    .btn-soneau:hover {
        background: #1fccac;
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(45, 255, 217, 0.4);
    }
</style>
@endsection