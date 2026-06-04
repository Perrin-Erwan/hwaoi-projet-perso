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
            {{-- AJOUT DE enctype="multipart/form-data" ICI --}}
            <form method="POST" action="{{ route('personnage.update', ['personnage' => $personnage->nom]) }}" enctype="multipart/form-data" class="p-4 p-md-5">
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

                    {{-- IMAGE ACTUELLE ET NOUVELLE IMAGE --}}
                    <div class="col-12 mt-4">
                        <label for="image" class="form-label-warriors text-turquoise">Illustration du Guerrier</label>
                        <div class="row align-items-center">
                            <div class="col-md-3 mb-3 mb-md-0 text-center">
                                @if($personnage->image_path)
                                    <p class="small text-muted mb-1">Actuelle :</p>
                                    <img src="{{ asset('public/images/personnages/' . $personnage->image_path) }}" class="rounded border border-turquoise" style="height: 100px; width: 100px; object-fit: cover;">
                                @else
                                    <div class="rounded border border-secondary d-flex align-items-center justify-content-center" style="height: 100px; width: 100px; background: rgba(255,255,255,0.05)">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-input-warriors" id="image" name="image">
                                <small class="text-muted mt-2 d-block italic">Laissez vide pour conserver l'image actuelle. PNG/JPG, max 2Mo.</small>
                            </div>
                        </div>
                    </div>

                    {{-- Description Courte --}}
                    <div class="col-12 mt-4">
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
                        <input type="number" class="form-input-warriors" id="coeurs_base" name="coeurs_base" 
                               value="{{ old('coeurs_base', $personnage->coeurs_base) }}" required min="1">
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
{{-- Styles inchangés --}}