@extends('layouts.app')

@section('title', 'Maîtrises de Combat')

@section('content')
<div class="warriors-page py-5">
    <div class="container">
        
        {{-- EN-TÊTE --}}
        <div class="text-center mb-5">
            <div class="style-header-main d-inline-block px-5 py-3 shadow-lg">
                <h1 class="display-4 fw-bold text-uppercase m-0">Styles de Combat</h1>
                <div class="h5 text-dark italic m-0">Disciplines Martiales & Magiques</div>
            </div>
            <p class="lead text-white-50 mt-4 mx-auto col-md-8 italic">
                Découvrez les différentes écoles de combat du royaume. Chaque style définit les techniques accessibles et le niveau de maîtrise requis pour chaque guerrier.
            </p>
        </div>

        {{-- GRILLE DES STYLES --}}
        <div class="row g-4">
            @foreach($styles as $style)
            <div class="col-lg-6">
                <div class="combat-style-card h-100">
                    
                    {{-- En-tête de la carte --}}
                    <div class="card-top-header d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center">
                            <div class="style-icon-box me-3">
                                <i class="fas fa-khanda"></i>
                            </div>
                            <h2 class="h4 fw-bold m-0 text-white text-uppercase">{{ $style->nom }}</h2>
                        </div>
                        <span class="badge-type">{{ $style->type }}</span>
                    </div>

                    <div class="p-4">
                        {{-- Description --}}
                        <div class="description-section mb-4">
                            <p class="text-white-50 small mb-0">
                                <i class="fas fa-quote-left me-2 opacity-25"></i>
                                {{ $style->description }}
                            </p>
                        </div>

                        {{-- Liste des Techniques liées via le pivot --}}
                        <div class="techniques-section">
                            <h6 class="text-turquoise fw-bold text-uppercase small mb-3">
                                <i class="fas fa-scroll me-2"></i> Arsenal de techniques
                            </h6>
                            
                            <div class="list-group list-group-flush bg-transparent">
                                @forelse($style->techniques as $tech)
                                    <div class="list-group-item bg-transparent border-secondary border-opacity-25 px-0 py-2 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-bolt text-warning me-2 small"></i>
                                            <span class="text-white">{{ $tech->nom }}</span>
                                        </div>
                                        {{-- Donnée issue de withPivot('mastery_level') --}}
                                        <span class="mastery-tag">
                                            NIV. {{ $tech->pivot->mastery_level }}
                                        </span>
                                    </div>
                                @empty
                                    <div class="text-muted small italic">Aucune technique liée à ce style actuellement.</div>
                                @endforelse
                            </div>
                        </div>

                        {{-- Footer de carte --}}
                        <div class="mt-4 pt-3 border-top border-secondary border-opacity-25 d-flex justify-content-between align-items-center">
                            <div class="compat-info small text-white-50">
                                <i class="fas fa-users me-1"></i> 
                                {{ $style->personnages->count() }} Utilisateurs
                            </div>
                            <a href="{{ route('personnage.list') }}" class="btn-style-link">
                                Voir les guerriers <i class="fas fa-chevron-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="soneau-decoration"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    /* --- FOND ET VARIABLES --- */
    body {
        background: radial-gradient(circle at center, #1a1a1a 0%, #050505 100%) !important;
        background-attachment: fixed !important;
    }

    .text-turquoise { color: #2DFFD9 !important; }

    /* --- EN-TÊTE SONEAU --- */
    .style-header-main {
        background: #2DFFD9;
        color: #000;
        clip-path: polygon(5% 0%, 95% 0%, 100% 50%, 95% 100%, 5% 100%, 0% 50%);
    }

    /* --- CARTE DE STYLE --- */
    .combat-style-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(45, 255, 217, 0.2);
        border-radius: 15px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .combat-style-card:hover {
        border-color: #2DFFD9;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), 0 0 15px rgba(45, 255, 217, 0.1);
    }

    .card-top-header {
        background: rgba(139, 0, 0, 0.1);
        border-bottom: 2px solid #8B0000;
    }

    .style-icon-box {
        width: 40px;
        height: 40px;
        background: #8B0000;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(139, 0, 0, 0.5);
    }

    .badge-type {
        background: rgba(45, 255, 217, 0.1);
        color: #2DFFD9;
        border: 1px solid #2DFFD9;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: bold;
        text-transform: uppercase;
    }

    /* --- TECHNIQUES --- */
    .mastery-tag {
        background: #1a1a1a;
        color: #2DFFD9;
        border: 1px solid rgba(45, 255, 217, 0.3);
        padding: 2px 10px;
        border-radius: 4px;
        font-size: 0.65rem;
        font-weight: bold;
    }

    .btn-style-link {
        color: #2DFFD9;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s;
    }

    .btn-style-link:hover {
        color: white;
        letter-spacing: 1px;
    }

    .soneau-decoration {
        position: absolute;
        bottom: -10px;
        right: -10px;
        width: 60px;
        height: 60px;
        border: 2px solid #2DFFD9;
        opacity: 0.05;
        transform: rotate(45deg);
    }
</style>
@endsection