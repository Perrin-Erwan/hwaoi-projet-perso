@extends('layouts.app')

@section('title', 'Liste des Personnages')

@section('content')
<div class="container mt-4">
    
    <h1 class="mb-4 text-center text-primary">Liste Complète de tous les Guerriers</h1>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('personnage.accueil') }}" class="btn btn-outline-secondary">
            ← Retour à l'Accueil
        </a>
        {{-- LIEN VERS LE SYSTÈME DE JEU --}}
        <a href="{{ route('systeme-jeu') }}" class="btn btn-info text-white shadow-sm">
             Explorer le Système de Jeu
        </a>
    </div>

    {{-- SECTION D'INTRODUCTION ET DE PRÉSENTATION --}}
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark shadow">
        <div class="col-md-10 px-0">
            <h2 class="display-4 fst-italic">Les Guerriers de l'ère du sceau</h2>
            <p class="lead my-3">
                Découvrez la liste complète des guerriers disponibles dans ce chapitre épique. 
                De puissants Sages aux figures historiques, chaque personnage apporte des compétences et des éléments uniques pour façonner le destin du royaume.
            </p>
            <p class="lead mb-0">
                <span class="text-warning me-2">⭐</span>
                Retrouvez notamment les figures centrales : 
                <strong>Zelda, le Roi Rauru</strong>, les sages et d'autres personnages emblématiques.
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    {{-- DÉBUT DE LA LISTE DES PERSONNAGES --}}
    @if ($personnages->count() > 0)
        <div class="row">
            @foreach ($personnages as $personnage)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        @if ($personnage->image_path)
                            <img src="{{ asset('images/personnages/' . $personnage->image_path) }}" 
                                 class="card-img-top" 
                                 alt="Image de {{ $personnage->nom }}" 
                                 style="height: 250px; object-fit: cover; background-color: #f8f9fa;">
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $personnage->nom }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted italic small">({{ $personnage->alias ?? 'Guerrier' }})</h6>
                            <hr>
                            <p class="card-text small">
                                <strong>Peuple :</strong> {{ $personnage->role ?? 'N/A' }} <br>
                                <strong>Cœurs :</strong> <span class="badge bg-danger">{{ $personnage->coeurs_base }}</span> <br>
                                <strong>Arme :</strong> {{ $personnage->arme_principale }}
                            </p>
                            <p class="card-text text-secondary">
                                {{ Str::limit($personnage->description_courte, 80) }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-3">
                            <a href="{{ route('personnage.show', ['personnage' => $personnage->nom]) }}" 
                               class="btn btn-primary btn-sm w-100">
                               Voir la fiche détaillée
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center shadow-sm" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Aucun personnage trouvé dans la base de données.
        </div>
    @endif
    {{-- FIN DE LA LISTE DES PERSONNAGES --}}

</div>
@endsection