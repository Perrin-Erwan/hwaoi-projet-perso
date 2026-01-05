@extends('layouts.app')

@section('title', 'Modifier ' . $personnage->nom)

@section('content')
<div class="warriors-page py-5">
    <div class="container">
        
        {{-- BOUTON RETOUR --}}
        <div class="mb-4">
            <a href="{{ route('personnage.show', ['personnage' => $personnage->nom]) }}" class="btn btn-warriors-outline">
                <i class="fas fa-times me-2"></i> Annuler l'édition
            </a>
        </div>
        
        {{-- TITRE DE LA FORGE --}}
        <div class="char-header-banner mb-5">
            <h1 class="display-5 fw-bold text-uppercase m-0">Altération des Archives</h1>
            <div class="h5 text-turquoise italic">Sujet : {{ $personnage->nom }}</div>
        </div>

        {{-- AFFICHAGE DES ERREURS --}}
        @if ($errors->any())
            <div class="alert bg-danger text-white border-0 shadow-lg mb-4">
                <div class="fw-bold mb-2"><i class="fas fa-exclamation-triangle me-2"></i> Erreurs détectées :</div>
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORMULAIRE STYLISÉ --}}
        <div class="edit-card shadow-lg">
            <form method="POST" action="{{ route('personnage.update', ['personnage' => $personnage->nom]) }}" class="p-4 p-md-5">
                @csrf
                @method('PUT') 

                <div class="row g-4">
                    
                    {{-- Nom --}}
                    <div class="col-md-6">
                        <label for="nom" class="form-label-warriors">Nom Complet</label>
                        <input type="text" class="form-input-warriors" id="nom" name="nom" 
                               value="{{ old('nom', $personnage->nom) }}" required>
                    </div>

                    {{-- Alias --}}
                    <div class="col-md-6">
                        <label for="alias" class="form-label-warriors">Alias / Titre</label>
                        <input type="text" class="form-input-warriors" id="alias" name="alias" 
                               value="{{ old('alias', $personnage->alias) }}">
                    </div>

                    {{-- Description Courte --}}
                    <div class="col-12">
                        <label for="description_courte" class="form-label-warriors">Accroche (Description Courte)</label>
                        <input type="text" class="form-input-warriors" id="description_courte" name="description_courte" 
                               value="{{ old('description_courte', $personnage->description_courte) }}">
                    </div>

                    {{-- Description Longue --}}
                    <div class="col-12">
                        <label for="description" class="form-label-warriors">Histoire & Détails</label>
                        <textarea class="form-input-warriors" id="description" name="description" rows="5" required>{{ old('description', $personnage->description) }}</textarea>
                    </div>

                    {{-- Peuple --}}
                    <div class="col-md-4">
                        <label for="role" class="form-label-warriors">Peuple d'Origine</label>
                        <select class="form-input-warriors form-select-warriors" id="role" name="role" required>
                            <option value="" disabled>Choisir un peuple...</option>
                            @php
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

                    {{-- Cœurs --}}
                    <div class="col-md-4">
                        <label for="coeurs_base" class="form-label-warriors">Cœurs de Base</label>
                        <div class="input-group">
                            <input type="number" class="form-input-warriors" id="coeurs_base" name="coeurs_base" 
                                   value="{{ old('coeurs_base', $personnage->coeurs_base) }}" required min="1">
                        </div>
                    </div>

                    {{-- Arme --}}
                    <div class="col-md-4">
                        <label for="arme_principale" class="form-label-warriors">Arme Principale</label>
                        <input type="text" class="form-input-warriors" id="arme_principale" name="arme_principale" 
                               value="{{ old('arme_principale', $personnage->arme_principale) }}" required>
                    </div>
                    
                    {{-- Élément --}}
                    <div class="col-md-4">
                        <label for="element" class="form-label-warriors">Élément Associé</label>
                        <input type="text" class="form-input-warriors" id="element" name="element" 
                               value="{{ old('element', $personnage->element) }}" placeholder="Physique, Feu, Glace...">
                    </div>
                    
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-soneau px-5 py-3 fw-bold">
                        <i class="fas fa-save me-2"></i> SAUVEGARDER DANS LES ARCHIVES
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

    /* --- BANNIÈRE --- */
    .char-header-banner {
        background: linear-gradient(90deg, #8B0000 0%, transparent 100%);
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

    .form-select-warriors {
        cursor: pointer;
    }
    .form-select-warriors option {
        background: #1a1a1a;
        color: #fff;
    }

    /* --- BOUTONS --- */
    .btn-warriors-outline {
        border: 1px solid #8B0000;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
    }
    .btn-warriors-outline:hover { background: #8B0000; color: white; }

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

    .border-turquoise {
        border-color: rgba(45, 255, 217, 0.3) !important;
    }
</style>
@endsection