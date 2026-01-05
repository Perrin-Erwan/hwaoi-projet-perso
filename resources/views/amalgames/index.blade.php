@extends('layouts.app')

@section('title', 'Archives des Amalgames Soneaux')

@section('content')
<div class="warriors-page py-5">
    <div class="container">
        
        {{-- HEADER ÉPIQUE --}}
        <div class="text-center mb-5">
            <div class="soneau-header-main d-inline-block px-5 py-3 shadow-lg">
                <h1 class="display-4 fw-bold text-uppercase m-0">Forge d'Amalgame</h1>
                <div class="h5 text-dark italic m-0">Technologie Ancestrale & Synergie d'Armes</div>
            </div>
            <p class="lead text-white-50 mt-4 mx-auto col-md-8">
                Consultez les archives des combinaisons d'armes et d'objets. L'amalgame permet de transcender la puissance brute pour libérer des capacités dévastatrices.
            </p>
        </div>

        {{-- GRILLE DES AMALGAMES --}}
        <div class="row g-4">
            @forelse($amalgames as $amalgame)
                <div class="col-md-6 col-lg-4">
                    <div class="amalgame-card h-100">
                        {{-- En-tête de la carte --}}
                        <div class="amalgame-card-header d-flex justify-content-between align-items-center">
                            <span class="badge-type">{{ $amalgame->arme_requise }}</span>
                            <div class="damage-display">
                                <span class="small opacity-50">PUISSANCE</span>
                                <span class="text-danger fw-bold ms-1">{{ $amalgame->degats }}</span>
                            </div>
                        </div>

                        {{-- Corps de la carte --}}
                        <div class="p-4">
                            <h4 class="text-turquoise text-uppercase fw-bold mb-3">{{ $amalgame->nom }}</h4>
                            
                            <div class="description-box mb-3">
                                <p class="small text-white-50 italic mb-0">
                                    "{{ $amalgame->description }}"
                                </p>
                            </div>

                            {{-- Détails techniques --}}
                            <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top border-secondary border-opacity-25">
                                <div class="character-link">
                                    <i class="fas fa-user-ninja me-2 text-white-50"></i>
                                    <span class="small fw-bold">{{ $amalgame->personnage->nom ?? 'Tous Guerriers' }}</span>
                                </div>
                                <i class="fas fa-microchip text-turquoise opacity-50"></i>
                            </div>
                        </div>
                        
                        {{-- Décoration Soneau --}}
                        <div class="soneau-corner"></div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert bg-dark text-turquoise border-turquoise shadow-lg">
                        <i class="fas fa-hammer me-2"></i> La forge est vide. Aucun amalgame n'a été recensé.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-5 text-center">
            <a href="{{ route('personnage.list') }}" class="btn btn-warriors-outline">
                <i class="fas fa-chevron-left me-2"></i> Retour aux Guerriers
            </a>
        </div>
    </div>
</div>

<style>
    /* --- CONFIGURATION DES COULEURS --- */
    body {
        background: radial-gradient(circle at center, #1a1a1a 0%, #050505 100%) !important;
        background-attachment: fixed !important;
    }

    .text-turquoise { color: #2DFFD9 !important; }
    .border-turquoise { border-color: #2DFFD9 !important; }

    /* --- HEADER SONEAU --- */
    .soneau-header-main {
        background: #2DFFD9;
        color: #000;
        border-radius: 4px;
        position: relative;
        clip-path: polygon(5% 0%, 95% 0%, 100% 50%, 95% 100%, 5% 100%, 0% 50%);
    }

    /* --- CARTES D'AMALGAME --- */
    .amalgame-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(45, 255, 217, 0.2);
        border-radius: 12px;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
        display: flex;
        flex-direction: column;
    }

    .amalgame-card:hover {
        transform: translateY(-10px);
        background: rgba(45, 255, 217, 0.05);
        border-color: #2DFFD9;
        box-shadow: 0 0 25px rgba(45, 255, 217, 0.2);
    }

    .amalgame-card-header {
        background: rgba(0, 0, 0, 0.5);
        padding: 10px 15px;
        border-bottom: 1px solid rgba(45, 255, 217, 0.1);
    }

    .badge-type {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        padding: 3px 10px;
        border-radius: 4px;
        font-size: 0.75rem;
        letter-spacing: 1px;
    }

    .description-box {
        min-height: 60px;
    }

    /* --- DÉCORATION SONEAU --- */
    .soneau-corner {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 30px;
        height: 30px;
        background: linear-gradient(135deg, transparent 50%, #2DFFD9 50%);
        opacity: 0.3;
    }

    /* --- BOUTON RETOUR --- */
    .btn-warriors-outline {
        border: 1px solid #8B0000;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        padding: 12px 30px;
        transition: 0.3s;
    }
    .btn-warriors-outline:hover {
        background: #8B0000;
        box-shadow: 0 0 15px rgba(139, 0, 0, 0.4);
    }
</style>
@endsection