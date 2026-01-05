@extends('layouts.app')

@section('title', 'Liste des Techniques Individuelles')

@section('content')
<div class="warriors-page py-5">
    <div class="container">
        
        {{-- HEADER --}}
        <div class="text-center mb-5">
            <div class="logo-container mb-3">
                <h1 class="display-4 fw-bold title-hyrule">CODEX DES <span class="title-warriors">TECHNIQUES</span></h1>
            </div>
            <p class="lead text-white-50 italic">Répertoire mystique des capacités spéciales des Guerriers d'Hyrule.</p>
            <span class="badge bg-dark border border-turquoise text-turquoise px-3 py-2">
                {{ $techniques->count() }} CAPACITÉS RÉPERTORIÉES
            </span>
        </div>

        {{-- GRILLE DES TECHNIQUES --}}
        <div class="row g-4">
            @forelse ($techniques as $technique)
                <div class="col-md-6 col-lg-4">
                    <div class="tech-card h-100">
                        <div class="tech-card-header d-flex justify-content-between align-items-center">
                            <h5 class="m-0 fw-bold text-uppercase">{{ $technique->nom }}</h5>
                            <div class="tech-damage">
                                @if ($technique->dégâts == 0)
                                    <span class="badge-utilitary">UTILITAIRE</span>
                                @else
                                    <span class="badge-damage">DMG {{ $technique->dégâts }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="tech-card-body p-3">
                            <div class="owner-badge mb-3">
                                <i class="fas fa-user-shield me-2"></i>
                                @if ($technique->personnageSpecifique)
                                    <a href="{{ route('personnage.show', $technique->personnageSpecifique->nom) }}" class="owner-link">
                                        {{ $technique->personnageSpecifique->nom }}
                                    </a>
                                @else
                                    <span class="text-muted">Technique Générique</span>
                                @endif
                            </div>
                            
                            <p class="tech-description">
                                {{ $technique->description }}
                            </p>
                        </div>
                        
                        <div class="tech-card-footer">
                            <div class="decoration-line"></div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert bg-dark text-white border-secondary">
                        <i class="fas fa-search me-2"></i> Aucune technique n'a été trouvée dans les archives.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-5 text-center">
            <a href="{{ route('personnage.list') }}" class="btn btn-warriors-outline">
                <i class="fas fa-chevron-left me-2"></i> Retour à l'Armée Royale
            </a>
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

    .text-turquoise { color: #2DFFD9; }
    .italic { font-style: italic; }

    /* --- LOGO / HEADER --- */
    .logo-container {
        background-color: #8B0000;
        display: inline-block;
        padding: 15px 40px;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        border-bottom: 4px solid #5a0000;
    }
    .title-hyrule { color: #FFFFFF; letter-spacing: 2px; }
    .title-warriors { color: #2DFFD9; text-shadow: 0 0 10px rgba(45, 255, 217, 0.5); }

    /* --- TECH CARD STYLE --- */
    .tech-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        position: relative;
        overflow: hidden;
    }

    .tech-card:hover {
        transform: translateY(-5px);
        border-color: #2DFFD9;
        box-shadow: 0 10px 20px rgba(0,0,0,0.4);
    }

    .tech-card-header {
        background: rgba(139, 0, 0, 0.2);
        padding: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .badge-damage {
        background: #8B0000;
        color: white;
        padding: 4px 10px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 0.75rem;
    }

    .badge-utilitary {
        background: #1a4a1a;
        color: #2DFFD9;
        border: 1px solid #2DFFD9;
        padding: 4px 10px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 0.75rem;
    }

    .owner-badge {
        font-size: 0.85rem;
        background: rgba(0,0,0,0.3);
        padding: 5px 12px;
        border-radius: 20px;
        display: inline-block;
    }

    .owner-link {
        color: #2DFFD9;
        text-decoration: none;
        font-weight: bold;
    }
    .owner-link:hover { text-decoration: underline; }

    .tech-description {
        font-size: 0.9rem;
        color: #bbb;
        line-height: 1.5;
        font-style: italic;
    }

    .tech-card-footer {
        padding: 10px;
        margin-top: auto;
    }

    .decoration-line {
        height: 2px;
        width: 40%;
        background: linear-gradient(90deg, #2DFFD9, transparent);
        border-radius: 2px;
    }

    /* --- BUTTONS --- */
    .btn-warriors-outline {
        border: 1px solid #8B0000;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        padding: 10px 25px;
    }
    .btn-warriors-outline:hover { background: #8B0000; color: white; }
</style>
@endsection