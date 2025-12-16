@extends('layouts.app')
@section('title', 'Gérer les Techniques Apprises : ' . $personnage->nom)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gérer les Techniques Apprises pour {{ $personnage->nom }} 🛠️</h1>
        <a href="{{ route('personnages.show', $personnage->nom) }}" class="btn btn-secondary">
            < Retour à la Fiche
        </a>
    </div>
    
    <p class="alert alert-info">
        Cochez les cases correspondant aux techniques que ce Guerrier a appris de façon permanente (indépendant de son arme actuelle).
    </p>

    {{-- Utilisation de la méthode PUT/PATCH via @method pour la synchronisation --}}
    <form action="{{ route('personnages.sync_techniques', $personnage->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="row">
            
            @forelse ($allTechniques->chunk(3) as $chunk)
                <div class="col-lg-4">
                    <ul class="list-group mb-4 shadow-sm">
                        @foreach ($chunk as $technique)
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name="techniques[]" 
                                        value="{{ $technique->id }}" 
                                        id="technique_{{ $technique->id }}"
                                        {{-- Vérifie si l'ID est dans le tableau des IDs actuellement apprises --}}
                                        {{ in_array($technique->id, $apprisesIds) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="technique_{{ $technique->id }}">
                                        <strong class="text-primary">{{ $technique->nom }}</strong> 
                                        <span class="badge bg-dark">{{ $technique->type }}</span>
                                    </label>
                                    <p class="text-muted small mt-1">{{ $technique->description }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @empty
                <p class="text-warning">Aucune technique individuelle n'est disponible dans la base de données.</p>
            @endforelse
            
        </div>
        
        <button type="submit" class="btn btn-success btn-lg mt-3 w-100">
            💾 Sauvegarder les Techniques Apprises
        </button>

    </form>
@endsection