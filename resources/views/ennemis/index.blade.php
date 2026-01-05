@extends('layouts.app')

@section('content')
{{-- Ajout d'une classe globale pour le style du fond --}}
<div class="bestiaire-page" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="container py-5">
        
        {{-- En-tête avec les couleurs Hyrule Warriors --}}
        <div class="text-center mb-5">
            <div class="logo-container mb-3">
                <h1 class="display-3 fw-bold title-hyrule">HYRULE <span class="title-warriors">WARRIORS</span></h1>
                <h2 class="h4 fw-light text-white subtitle-chroniques">Les Chroniques du Sceau</h2>
            </div>
            <p class="lead text-muted mt-3">Archives du Royaume : Recensement des menaces et des ressources</p>
        </div>

        {{-- Barre de recherche --}}
        <div class="row mb-4 justify-content-center">
            <div class="col-md-6">
                <div class="input-group input-group-lg shadow-sm border-custom">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="enemySearch" class="form-control border-start-0" 
                           placeholder="Rechercher un ennemi ou un butin (ex: Lynel, Corne...)">
                </div>
            </div>
        </div>

        {{-- Navigation des catégories stylisée --}}
        <ul class="nav nav-pills nav-fill mb-4 p-2 custom-nav-pills rounded" id="bestiaireTabs" role="tablist">
            @foreach($ennemis as $categorie => $liste)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }} fw-bold" 
                        id="{{ Str::slug($categorie) }}-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#{{ Str::slug($categorie) }}" 
                        type="button" role="tab">
                    {{ strtoupper($categorie) }} ({{ $liste->count() }})
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
                    <div class="col-md-4 col-lg-3 enemy-card" 
                         data-name="{{ $ennemi->nom }}" 
                         data-loot="{{ $ennemi->butin }}">
                        
                        <div class="card h-100 shadow-sm border-0 border-top border-4 {{ $categorie == 'Boss' ? 'border-danger' : 'border-secondary' }} monster-card">
                            <div class="card-body">
                                <h5 class="fw-bold mb-1 text-dark">{{ $ennemi->nom }}</h5>
                                <span class="badge bg-light text-dark border mb-3">{{ $categorie }}</span>
                                
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-heart text-danger me-2"></i>
                                    <span class="fw-bold text-secondary">{{ number_format($ennemi->points_de_vie) }} PV</span>
                                </div>

                                <div class="mt-3 p-3 bg-light rounded-3 shadow-inner border">
                                    <small class="text-uppercase fw-bold text-muted d-block mb-2" style="font-size: 0.7rem;">
                                        <i class="fas fa-gem me-1"></i>Butins possibles
                                    </small>
                                    <p class="small mb-0">
                                        {{-- Style turquoise Soneau appliqué --}}
                                        <span class="badge w-100 text-wrap py-2" style="background-color: #2DFFD9; color: #000; font-size: 0.85rem; border: 1px solid #1bc9a9;">
                                            {{ $ennemi->butin }}
                                        </span>
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
</div>

<style>
    /* Fond de page principal */
    body {
        /* Dégradé sombre rappelant l'arrière-plan de l'affiche */
        background: radial-gradient(circle at center, #2b1d16 0%, #0c0c0c 100%);
        background-attachment: fixed;
        color: #ffffff;
    }

    .bestiaire-page {
        background: transparent !important; /* On laisse voir le dégradé du body */
    }

    /* Effet de lueur turquoise diffuse en bas de page */
    .bestiaire-page::after {
        content: "";
        position: fixed;
        bottom: -150px;
        left: 50%;
        transform: translateX(-50%);
        width: 600px;
        height: 300px;
        background: rgba(45, 255, 217, 0.1);
        filter: blur(100px);
        z-index: -1;
        pointer-events: none;
    }

    /* --- CARTES STYLE "MENU GUERRIER" --- */
    .monster-card {
        background: rgba(255, 255, 255, 0.05) !important; /* Semi-transparent */
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .monster-card:hover {
        background: rgba(45, 255, 217, 0.05) !important;
        border-color: #2DFFD9 !important;
        box-shadow: 0 0 20px rgba(45, 255, 217, 0.3) !important;
    }

    .monster-card h5 {
        color: #ffffff !important;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
    }

    /* --- BARRES ET BADGES --- */
    .bg-light {
        background-color: rgba(0, 0, 0, 0.4) !important; /* Fonds sombres pour les butins */
        color: #eee !important;
    }

   /* Barre d'onglets personnalisée */
    .custom-nav-pills {
        background: rgba(0, 0, 0, 0.6) !important; /* Fond sombre transparent */
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Style par défaut des liens non-actifs */
    .custom-nav-pills .nav-link {
        color: #ffffff !important;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    /* Style de l'onglet ACTIF (devient rouge pour n'importe quelle catégorie) */
    .custom-nav-pills .nav-link.active {
        background-color: #8B0000 !important; /* Rouge foncé Hyrule Warriors */
        color: #ffffff !important;
        box-shadow: 0 0 15px rgba(139, 0, 0, 0.4);
    }

    /* Effet au survol des onglets non-actifs */
    .custom-nav-pills .nav-link:hover:not(.active) {
        background-color: rgba(255, 255, 255, 0.1);
        color: #2DFFD9 !important; /* Texte turquoise au survol */
    }

    /* Ajustement de la barre de recherche pour qu'elle ne soit pas trop "flashy" */
    .border-custom {
        background: rgba(20, 20, 20, 0.9) !important;
        border: 2px solid #2DFFD9 !important;
    }
    
    .border-custom input {
        color: white !important;
        background: transparent !important;
    }

    .border-custom input::placeholder {
        color: rgba(255,255,255,0.5);
    }

    /* Adaptation de la barre de recherche */
    .border-custom {
        background: rgba(255, 255, 255, 0.9);
        border: 2px solid #2DFFD9 !important; /* Bordure turquoise pour le rappel Soneau */
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
        
        if (name.includes(searchTerm) || loot.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });

    if (searchTerm !== "") {
        tabs.forEach(tab => {
            const visibleCards = tab.querySelectorAll('.enemy-card[style="display: block;"]');
            if (visibleCards.length > 0) {
                tab.classList.add('show', 'active');
                // Optionnel : Activer aussi le bouton de l'onglet correspondant
                const tabId = tab.getAttribute('id');
                document.querySelector(`button[data-bs-target="#${tabId}"]`).classList.add('active');
            } else {
                tab.classList.remove('show', 'active');
                const tabId = tab.getAttribute('id');
                document.querySelector(`button[data-bs-target="#${tabId}"]`).classList.remove('active');
            }
        });
    } else {
        // Si la recherche est vide, on remet le premier onglet par défaut
        tabs.forEach((tab, index) => {
            if(index === 0) {
                tab.classList.add('show', 'active');
                const tabId = tab.getAttribute('id');
                document.querySelector(`button[data-bs-target="#${tabId}"]`).classList.add('active');
            } else {
                tab.classList.remove('show', 'active');
                const tabId = tab.getAttribute('id');
                document.querySelector(`button[data-bs-target="#${tabId}"]`).classList.remove('active');
            }
        });
    }
});
</script>
@endsection