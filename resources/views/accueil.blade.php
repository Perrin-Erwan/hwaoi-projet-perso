@extends('layouts.app')

@section('title', 'Accueil - Chroniques du Sceau')

@section('content')
<div class="container mt-4">
    
    <h1 class="mb-4 text-center text-primary fw-bold">Hyrule Warriors : Les Chroniques du Sceau</h1>

    {{-- SECTION D'INTRODUCTION (HERO SECTION) --}}
    <div class="p-4 p-md-5 mb-5 text-white rounded bg-dark shadow-lg border-start border-primary border-5">
        <div class="col-md-10 px-0">
            <h2 class="display-4 fst-italic">Découvrez la Guerre de l'Ère des Légendes</h2>
            <p class="lead my-3">
                Ce récit relate les événements tragiques et héroïques de la Guerre du Sceau. 
                Entre la maîtrise des armes ancestrales et le destin des peuples d'Hyrule, plongez dans une aventure épique.
            </p>
            <p class="lead mb-0">
                <span class="text-warning me-2">⭐</span>
                <strong>Incarnez des guerriers légendaires</strong> et exploitez la puissance des attaques en duo pour triompher !
            </p>
        </div>
    </div>
    
    {{-- BOUTONS D'ACTION --}}
    <div class="row mb-5">
        <div class="col-md-6 mb-3">
            <a href="{{ route('personnage.list') }}" class="btn btn-primary btn-lg w-100 shadow-sm py-3">
                <i class="fas fa-users me-2"></i> Afficher TOUS les Guerriers
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('systeme-jeu') }}" class="btn btn-info text-white btn-lg w-100 shadow-sm py-3">
                <i class="fas fa-book me-2"></i> Système de Jeu
            </a>
        </div>
    </div>
    
    <hr class="my-5">

    {{-- APERÇU ALÉATOIRE --}}
    <h2 class="text-center mb-4"><i class="fas fa-dice text-secondary me-2"></i> Guerriers en Vedette</h2>

    @if ($personnagesAleatoires->count() > 0)
        <div class="row">
            @foreach ($personnagesAleatoires as $personnage)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100 border-0 transition-hover">
                         {{-- Image du personnage --}}
                        @if ($personnage->image_path)
                            <img src="{{ asset('images/personnages/' . $personnage->image_path) }}" 
                                 class="card-img-top" 
                                 alt="Image de {{ $personnage->nom }}" 
                                 style="height: 280px; object-fit: cover; background-color: #f8f9fa;">
                        @endif
                        
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $personnage->nom }}</h5>
                            <p class="card-text text-muted mb-3">
                                <span class="badge bg-light text-dark border">{{ $personnage->role ?? 'Guerrier' }}</span>
                            </p>
                            <a href="{{ route('personnage.show', ['personnage' => $personnage->nom]) }}" 
                               class="btn btn-outline-primary btn-sm px-4">
                               Voir la fiche détaillée
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center shadow-sm" role="alert">
            Aucun guerrier n'est actuellement disponible dans la base de données.
        </div>
    @endif

</div>

{{-- Petit style local pour l'effet de survol des cartes --}}
<style>
    .transition-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
</style>
@endsection