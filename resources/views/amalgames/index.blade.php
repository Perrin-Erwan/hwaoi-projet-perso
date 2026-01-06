@extends('layouts.app')

@section('content')
<div class="warriors-page py-5">
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-turquoise">FORGE DES AMALGAMES</h1>
            <p class="text-white-50">Répertoire des synergies par guerrier</p>
        </div>

        @forelse($amalgames as $nomPersonnage => $attaques)
            <div class="personnage-section mb-5">
                {{-- Titre du Groupe (Le Guerrier) --}}
                <h2 class="h4 border-bottom border-danger pb-2 mb-4 text-uppercase fw-bold">
                    <i class="fas fa-shield-alt text-danger me-2"></i>
                    {{ $nomPersonnage ?: 'Capacités Générales' }}
                </h2>

                <div class="row g-3">
                    @foreach($attaques as $amalgame)
                        <div class="col-md-4">
                            <div class="amalgame-card h-100 p-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="badge bg-dark border-turquoise text-turquoise">{{ $amalgame->arme_requise }}</span>
                                    <span class="text-danger fw-bold">{{ $amalgame->degats }} PV</span>
                                </div>
                                <h5 class="fw-bold text-white mb-2">{{ $amalgame->nom }}</h5>
                                <p class="small text-white-50 mb-0 italic" style="font-size: 0.8rem;">
                                    {!! nl2br(e($amalgame->description)) !!}
                                </p>
                                {{-- Badge d'élément dynamique --}}
                                <div class="mt-3">
                                    <span class="badge element-{{ Str::slug($amalgame->type) }} small">
                                        {{ $amalgame->type }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <p class="text-center text-white-50">Aucun amalgame détecté.</p>
        @endforelse
    </div>
</div>

<style>

     body {
        background: radial-gradient(circle at center, #1a1a1a 0%, #050505 100%) !important;
        background-attachment: fixed !important;
        color: #eee;
    }

    .text-turquoise { color: #2DFFD9 !important; }

    /* --- HEADER SONEAU --- */
    .soneau-header-main {
        background: #2DFFD9;
        color: #000;
        clip-path: polygon(5% 0%, 95% 0%, 100% 50%, 95% 100%, 5% 100%, 0% 50%);
    }

    /* --- CARDS --- */
    .amalgame-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(45, 255, 217, 0.2);
        border-radius: 10px;
        position: relative;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
    }

    .amalgame-card:hover {
        border-color: #2DFFD9;
        transform: translateY(-5px);
        box-shadow: 0 0 20px rgba(45, 255, 217, 0.2);
    }

    .amalgame-card-header {
        background: rgba(0, 0, 0, 0.3);
        padding: 12px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .badge-type {
        font-size: 0.7rem;
        font-weight: bold;
        text-transform: uppercase;
        color: #2DFFD9;
        letter-spacing: 1px;
    }

    /* --- ÉLÉMENTS --- */
    .badge-element {
        font-size: 0.6rem;
        padding: 3px 8px;
        border-radius: 3px;
        font-weight: bold;
        border: 1px solid transparent;
    }
    .element-physique { background: #444; color: #fff; }
    .element-feu { background: #8B0000; color: #fff; border-color: #ff4444; }
    .element-glace { background: #0066cc; color: #fff; border-color: #33ccff; }
    .element-electrique { background: #ccaa00; color: #000; border-color: #ffff00; }
    .element-explosif { background: #ff6600; color: #fff; border-color: #ffcc00; }

    .description-box { min-height: 80px; }

    .soneau-corner {
        position: absolute; bottom: 0; right: 0; width: 20px; height: 20px;
        background: linear-gradient(135deg, transparent 50%, #2DFFD9 50%);
        opacity: 0.2;
    }

    /* Styles pour différencier les éléments du seeder */
    .element-feu { background: #8B0000; }
    .element-glace { background: #0066cc; }
    .element-electrique { background: #ccaa00; color: black; }
    .element-physique { background: #444; }
    .element-explosif { background: #ff6600; }
    
    .amalgame-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        transition: 0.2s;
    }
    .amalgame-card:hover { border-color: #2DFFD9; transform: scale(1.02); }
    .text-turquoise { color: #2DFFD9; }
    .border-turquoise { border-color: #2DFFD9; }
</style>
@endsection