@extends('layouts.app')

@section('title', 'Système de Jeu')

@section('content')
<div class="warriors-page py-5">
    <div class="container">
        
        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="char-header-banner w-75">
                <h1 class="display-5 fw-bold text-uppercase m-0">Système de Jeu</h1>
                <div class="h5 text-turquoise italic">Règles de combat et Mécaniques du Sceau</div>
            </div>
            <a href="{{ route('personnage.list') }}" class="btn btn-warriors-outline">
                <i class="fas fa-chevron-left me-2"></i> Retour
            </a>
        </div>

        <div class="row g-4">
            
            {{-- SECTION 1 : CLASSIFICATION DES ARMES --}}
            <div class="col-md-6">
                <div class="sub-card h-100 shadow-lg">
                    <div class="sub-header bg-yellow text-dark fw-bold text-uppercase">
                        <i class="fas fa-fist-raised me-2"></i> Armes & Types
                    </div>
                    <div class="p-4 bg-glass">
                        <p class="text-white-50">Le système de combat repose sur la classification des armes, déterminant la portée et les types d'attaques.</p>
                        
                        <div class="mb-4">
                            <div class="d-flex align-items-start mb-2">
                                <i class="fas fa-star text-warning mt-1 me-3"></i>
                                <div>
                                    <strong class="text-white">Armes Uniques :</strong>
                                    <p class="small text-white-50">Spécifiques à un héros (ex : Épée de lumière de Zelda).</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <i class="fas fa-shield-alt text-secondary mt-1 me-3"></i>
                                <div>
                                    <strong class="text-white">Armes Génériques :</strong>
                                    <p class="small text-white-50">Accessibles via une licence de type (1M, 2M, Lance).</p>
                                </div>
                            </div>
                        </div>

                        <h6 class="text-turquoise text-uppercase fw-bold mb-3">Catégories génériques :</h6>
                        <div class="weapon-grid">
                            <div class="weapon-badge">
                                <span>Arme à une main (1M)</span>
                                <span class="badge bg-secondary">Équilibré</span>
                            </div>
                            <div class="weapon-badge border-danger">
                                <span>Arme à deux mains (2M)</span>
                                <span class="badge bg-danger">Puissant</span>
                            </div>
                            <div class="weapon-badge border-info">
                                <span>Lance (L)</span>
                                <span class="badge bg-info text-dark">Portée</span>
                            </div>
                            <div class="weapon-badge border-success">
                                <span>Arc (A)</span>
                                <span class="badge bg-success">Distance</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2 : TECHNIQUES & SYNERGIE --}}
            <div class="col-md-6">
                <div class="sub-card h-100 shadow-lg border-danger">
                    <div class="sub-header bg-danger text-white fw-bold text-uppercase">
                        <i class="fas fa-bolt me-2"></i> Techniques et Attaques Synchro
                    </div>
                    <div class="p-4 bg-glass">
                        <p class="text-white-50">Deux mécanismes clés régissent les capacités spéciales en combat :</p>
                        
                        <div class="tech-box mb-4">
                            <h5 class="text-danger fw-bold"><i class="fas fa-caret-right me-2"></i>Techniques Individuelles</h5>
                            <p class="small text-white-50">Capacités propres à chaque guerrier, utilisables sans condition de partenaire. Elles consomment la jauge d'endurance.</p>
                        </div>
                        
                        <div class="tech-box">
                            <h5 class="text-turquoise fw-bold"><i class="fas fa-link me-2"></i>Attaques Synchro (Synergie)</h5>
                            <p class="small text-white-50 mb-3">Requiert un duo spécifique sur le champ de bataille :</p>
                            <div class="list-group list-group-flush bg-transparent">
                                <div class="list-group-item bg-transparent text-white border-secondary border-opacity-25 ps-0">
                                    <span class="badge border border-secondary text-secondary me-2">NORMALE</span> Synergie de base entre deux alliés.
                                </div>
                                <div class="list-group-item bg-transparent text-white border-0 ps-0">
                                    <span class="badge border border-warning text-warning me-2">SPÉCIALE</span> Attaque surpuissante liée au scénario.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        {{-- SECTION 3 : ELEMENTS ET RÔLES --}}
        <div class="soneau-section mt-5 shadow-lg">
            <div class="soneau-header">
                <i class="fas fa-info-circle me-2"></i> AUTRES CONCEPTS CLÉS
            </div>
            <div class="row text-center p-4 g-4">
                <div class="col-md-6 border-end border-secondary border-opacity-25">
                    <h5 class="text-turquoise fw-bold text-uppercase mb-3"><i class="fas fa-tint me-2"></i>Éléments</h5>
                    <p class="text-white-50 small mb-0">Les types élémentaires (Feu, Glace, Lumière, Électricité) définissent les bonus de dégâts et les altérations d'état contre les ennemis vulnérables.</p>
                </div>
                <div class="col-md-6">
                    <h5 class="text-danger fw-bold text-uppercase mb-3"><i class="fas fa-heart me-2"></i>Cœurs de base</h5>
                    <p class="text-white-50 small mb-0">Indique la résistance physique et la vitalité initiale. Les cœurs peuvent être augmentés via l'expérience ou des équipements spécifiques.</p>
                </div>
            </div>
        </div>
        
    </div>
</div>

<style>
    /* --- AMBIANCE --- */
    body {
        background: radial-gradient(circle at center, #2b1d16 0%, #0c0c0c 100%) !important;
        background-attachment: fixed !important;
        color: #eee;
    }

    .text-turquoise { color: #2DFFD9 !important; }
    .italic { font-style: italic; }

    /* --- TITRE BANNIÈRE --- */
    .char-header-banner {
        background: linear-gradient(90deg, #8B0000 0%, transparent 100%);
        padding: 15px 30px;
        border-left: 8px solid #2DFFD9;
        clip-path: polygon(0 0, 95% 0, 100% 100%, 0% 100%);
    }

    /* --- SUB CARDS --- */
    .sub-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        overflow: hidden;
        border-radius: 8px;
    }
    .sub-header { padding: 10px 20px; font-size: 0.9rem; letter-spacing: 1px; }
    .bg-yellow { background: #d4a017; }
    .bg-glass { background: rgba(0,0,0,0.3); }

    /* --- WEAPON BADGES --- */
    .weapon-grid {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .weapon-badge {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: rgba(255,255,255,0.03);
        padding: 10px 15px;
        border-left: 4px solid #888;
        border-radius: 4px;
    }
    .weapon-badge:hover { background: rgba(255,255,255,0.08); }

    /* --- TECH BOXES --- */
    .tech-box {
        background: rgba(0,0,0,0.4);
        padding: 15px;
        border-radius: 6px;
        border: 1px solid rgba(255,255,255,0.05);
    }

    /* --- SONEAU SECTION --- */
    .soneau-section {
        border: 2px solid #2DFFD9;
        background: rgba(45, 255, 217, 0.05);
        border-radius: 10px;
        overflow: hidden;
    }
    .soneau-header {
        background: #2DFFD9;
        color: #000;
        padding: 12px 25px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* --- BUTTONS --- */
    .btn-warriors-outline {
        border: 1px solid #8B0000;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn-warriors-outline:hover { background: #8B0000; color: white; }
</style>
@endsection