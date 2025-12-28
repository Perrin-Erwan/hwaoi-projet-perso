@extends('layouts.app')

@section('title', 'Système de Jeu')

@section('content')
<div class="container mt-4">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 text-primary">Système de Jeu et Règles de Combat</h1>
        <a href="{{ route('personnage.list') }}" class="btn btn-outline-secondary">
            ← Retour à la liste
        </a>
    </div>

    <hr>

    <div class="row">
        
        {{-- SECTION 1 : CLASSIFICATION DES ARMES --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="fas fa-fist-raised me-2"></i> Armes & Types
                </div>
                <div class="card-body">
                    <p>Le système de combat repose sur la classification des armes, qui détermine les types d'attaques disponibles et la portée des personnages.</p>
                    
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong><i class="fas fa-star text-warning"></i> Armes Uniques :</strong> Spécifiques à un héros (ex : Épée de lumière de Zelda).</li>
                        <li class="mb-2"><strong><i class="fas fa-shield-alt text-secondary"></i> Armes Génériques :</strong> Accessibles via une licence de type.</li>
                    </ul>

                    <p class="mt-3 fw-bold">Types d'armes génériques :</p>
                    <div class="list-group">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Arme à une main (1M)
                            <span class="badge bg-secondary rounded-pill">Équilibré</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Arme à deux mains (2M)
                            <span class="badge bg-danger rounded-pill">Puissant</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Lance (L)
                            <span class="badge bg-info text-dark rounded-pill">Portée</span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            Arc (A)
                            <span class="badge bg-success rounded-pill">Distance</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SECTION 2 : TECHNIQUES & SYNERGIE --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-header bg-danger text-white fw-bold">
                    <i class="fas fa-bolt me-2"></i> Techniques et Attaques Synchro
                </div>
                <div class="card-body">
                    <p>Deux mécanismes clés régissent les capacités spéciales en combat :</p>
                    
                    <h5 class="text-danger mt-3">Techniques Individuelles</h5>
                    <p class="small text-muted">Capacités propres à chaque guerrier, utilisables sans condition de partenaire.</p>
                    
                    <h5 class="text-primary mt-4">Attaques Synchro (Synergie)</h5>
                    <p class="small mb-2">Requiert un duo spécifique pour être exécutée :</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 ps-0">
                            <span class="badge bg-secondary me-2">Normale</span> Synergie de base entre deux alliés.
                        </li>
                        <li class="list-group-item border-0 ps-0">
                            <span class="badge bg-warning text-dark me-2">Spéciale</span> Attaque surpuissante liée au scénario ou au lien d'amitié.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div> {{-- Fin row --}}
    
    {{-- SECTION 3 : ÉLÉMENTS ET RÔLES --}}
    <div class="card shadow-sm mb-5 border-0">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-info-circle me-2"></i> Autres Concepts Clés
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-6 border-end">
                    <h6 class="fw-bold"><i class="fas fa-tint text-primary"></i> Éléments</h6>
                    <p class="small text-muted mb-0">Les types élémentaires (Feu, Glace, Lumière) définissent les bonus de dégâts contre certains ennemis.</p>
                </div>
                <div class="col-md-6">
                    <h6 class="fw-bold"><i class="fas fa-heart text-danger"></i> Cœurs de base</h6>
                    <p class="small text-muted mb-0">Indique la résistance et la vitalité initiale du personnage avant toute amélioration.</p>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection