@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-danger text-uppercase">Bestiaire d'Hyrule</h1>
        <p class="lead text-muted">Consultez les rapports de combat et les ressources disponibles.</p>
    </div>

    {{-- Barre de recherche --}}
    <div class="row mb-4 justify-content-center">
        <div class="col-md-6">
            <div class="input-group input-group-lg shadow-sm">
                <span class="input-group-text bg-white border-end-0 text-muted">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="enemySearch" class="form-control border-start-0" 
                       placeholder="Rechercher un ennemi ou un butin (ex: Lynel, Corne...)">
            </div>
        </div>
    </div>

    {{-- Navigation des catégories --}}
    <ul class="nav nav-pills nav-fill mb-4 shadow-sm p-2 bg-white rounded" id="bestiaireTabs" role="tablist">
        @foreach($ennemis as $categorie => $liste)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $loop->first ? 'active bg-danger' : 'text-dark' }} fw-bold" 
                    id="{{ Str::slug($categorie) }}-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#{{ Str::slug($categorie) }}" 
                    type="button" role="tab">
                {{ $categorie }} ({{ $liste->count() }})
            </button>
        </li>
        @endforeach
    </ul>

    {{-- Contenu des onglets --}}
    <div class="tab-content" id="bestiaireTabsContent">
        @foreach($ennemis as $categorie => $liste)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
             id="{{ Str::slug($categorie) }}" role="tabpanel">
            
            <div class="row g-4">
                @foreach($liste as $ennemi)
                {{-- AJOUT DES ATTRIBUTS DATA POUR LE JAVASCRIPT --}}
                <div class="col-md-4 col-lg-3 enemy-card" 
                     data-name="{{ $ennemi->nom }}" 
                     data-loot="{{ $ennemi->butin }}">
                    
                    <div class="card h-100 shadow-sm border-0 border-top border-4 {{ $categorie == 'Boss' ? 'border-danger' : 'border-secondary' }}">
                        <div class="card-body">
                            <h5 class="fw-bold mb-1">{{ $ennemi->nom }}</h5>
                            <span class="badge bg-light text-dark border mb-3">{{ $categorie }}</span>
                            
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-heart text-danger me-2"></i>
                                <span class="fw-bold">{{ number_format($ennemi->points_de_vie) }} PV</span>
                            </div>

                            <div class="mt-3 p-2 bg-light rounded shadow-inner">
                                <small class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.7rem;">Butins possibles :</small>
                                <p class="small mb-0 text-dark">
                                    <i class="fas fa-box-open me-1 text-secondary"></i> {{ $ennemi->butin }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .nav-pills .nav-link.active { transition: 0.3s; }
    .card { transition: transform 0.2s; }
    .card:hover { transform: translateY(-5px); }
    /* Optionnel : cacher visuellement les cartes filtrées */
    .enemy-card[style="display: none;"] {
        display: none !important;
    }
</style>

<script>
document.getElementById('enemySearch').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.enemy-card');
    const tabs = document.querySelectorAll('.tab-pane');

    cards.forEach(card => {
        const name = card.getAttribute('data-name').toLowerCase();
        const loot = card.getAttribute('data-loot').toLowerCase();
        
        // Si le nom ou le butin contient le mot recherché
        if (name.includes(searchTerm) || loot.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });

    // Gestion automatique des onglets pendant la recherche
    if (searchTerm !== "") {
        tabs.forEach(tab => {
            const visibleCards = tab.querySelectorAll('.enemy-card[style="display: block;"]');
            if (visibleCards.length > 0) {
                // On active l'onglet s'il contient des résultats
                tab.classList.add('show', 'active');
            } else {
                // On cache l'onglet s'il est vide
                tab.classList.remove('show', 'active');
            }
        });
    }
});
</script>
@endsection