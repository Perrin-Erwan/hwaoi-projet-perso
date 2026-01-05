@extends('layouts.app')

@section('title', 'Liste des Personnages')

@section('content')
<div class="warriors-page">
    <div class="container py-5">
        
        <div class="text-center mb-5">
            <div class="logo-container mb-3">
                <h1 class="display-3 fw-bold title-hyrule">HYRULE <span class="title-warriors">WARRIORS</span></h1>
                <h2 class="h4 fw-light text-white subtitle-chroniques">Les Chroniques du Sceau</h2>
            </div>
            <h3 class="mt-4 text-white text-uppercase letter-spacing-2">Archives de l'Armée Royale</h3>
        </div>

        <div class="d-flex justify-content-between mb-5">
            <a href="{{ route('personnage.accueil') }}" class="btn btn-warriors-outline">
                <i class="fas fa-chevron-left me-2"></i> Retour
            </a>
            <a href="{{ route('systeme-jeu') }}" class="btn btn-soneau">
                 Explorer le Système de Jeu <i class="fas fa-scroll ms-2"></i>
            </a>
        </div>

        <div class="intro-box mb-5">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2 class="text-turquoise italic">Les Guerriers de l'ère du sceau</h2>
                    <p class="lead mb-0">
                        Découvrez les figures centrales : <strong>Zelda, le Roi Rauru</strong>, les Sages et les héros légendaires 
                        qui façonnent le destin du royaume face au Sceau.
                    </p>
                </div>
            </div>
        </div>

        @if ($personnages->count() > 0)
            <div class="row g-4">
                @foreach ($personnages as $personnage)
                    <div class="col-md-4 col-lg-3">
                        <div class="character-card">
                            <div class="card-image-wrapper">
                                @if ($personnage->image_path)
                                    <img src="{{ asset('images/personnages/' . $personnage->image_path) }}" 
                                         class="char-img" alt="{{ $personnage->nom }}">
                                @endif
                                <div class="char-overlay"></div>
                                <div class="char-name-badge">
                                    <h5 class="m-0 fw-bold">{{ $personnage->nom }}</h5>
                                    <small class="text-turquoise">{{ $personnage->alias ?? 'Guerrier' }}</small>
                                </div>
                            </div>
                            
                            <div class="card-body p-3">
                                <div class="char-stats mb-3">
                                    <div class="d-flex justify-content-between small mb-1">
                                        <span><i class="fas fa-users text-muted me-1"></i> {{ $personnage->role }}</span>
                                        <span class="text-danger"><i class="fas fa-heart"></i> {{ $personnage->coeurs_base }}</span>
                                    </div>
                                    <div class="weapon-tag">
                                        <i class="fas fa-khanda me-1"></i> {{ $personnage->arme_principale }}
                                    </div>
                                </div>
                                
                                <p class="char-desc">
                                    {{ Str::limit($personnage->description_courte, 70) }}
                                </p>
                                
                                <a href="{{ route('personnage.show', ['personnage' => $personnage->nom]) }}" 
                                   class="btn btn-view-profile w-100 mt-2">
                                   VOIR LA FICHE
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert bg-dark text-white text-center border-danger border-2">
                <i class="fas fa-exclamation-triangle text-danger me-2"></i>
                Aucun guerrier n'a été recensé dans les archives.
            </div>
        @endif
    </div>
</div>

<style>
    /* --- AMBIANCE GÉNÉRALE --- */
    body {
        background: radial-gradient(circle at center, #2b1d16 0%, #0c0c0c 100%) !important;
        background-attachment: fixed !important;
        color: #ffffff;
    }

    .warriors-page { min-height: 100vh; }

    .letter-spacing-2 { letter-spacing: 2px; }
    .text-turquoise { color: #2DFFD9; }

    /* --- LOGO CONTAINER (Bordeaux) --- */
    .logo-container {
        background-color: #8B0000;
        display: inline-block;
        padding: 20px 50px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        border-bottom: 4px solid #5a0000;
    }

    .title-hyrule {
        color: #FFFFFF;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        letter-spacing: 2px;
    }

    .title-warriors {
        color: #2DFFD9;
        text-shadow: 0 0 15px rgba(45, 255, 217, 0.8);
        font-style: italic;
    }

    .subtitle-chroniques {
        letter-spacing: 5px;
        text-transform: uppercase;
        font-size: 1.1rem;
    }

    /* --- BOUTONS --- */
    .btn-warriors-outline {
        border: 1px solid #8B0000;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
    }
    .btn-warriors-outline:hover { background: #8B0000; color: white; }

    .btn-soneau {
        background: #2DFFD9;
        color: #000;
        font-weight: bold;
        text-transform: uppercase;
        box-shadow: 0 0 10px rgba(45, 255, 217, 0.4);
    }

    /* --- CARDS STYLE --- */
    .character-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .character-card:hover {
        transform: translateY(-10px);
        border-color: #2DFFD9;
        box-shadow: 0 10px 25px rgba(45, 255, 217, 0.2);
    }

    .card-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .char-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .character-card:hover .char-img { transform: scale(1.1); }

    .char-overlay {
        position: absolute;
        bottom: 0; left: 0; width: 100%; height: 60%;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
    }

    .char-name-badge {
        position: absolute;
        bottom: 15px;
        left: 15px;
        z-index: 2;
    }

    .weapon-tag {
        background: rgba(0,0,0,0.5);
        padding: 5px 10px;
        border-radius: 5px;
        border-left: 3px solid #2DFFD9;
        font-size: 0.8rem;
    }

    .char-desc {
        font-size: 0.85rem;
        color: #bbb;
        height: 40px;
        overflow: hidden;
    }

    .btn-view-profile {
        background: transparent;
        border: 1px solid #444;
        color: #fff;
        font-size: 0.8rem;
        letter-spacing: 1px;
        transition: 0.3s;
    }

    .character-card:hover .btn-view-profile {
        background: #2DFFD9;
        color: #000;
        border-color: #2DFFD9;
    }

    /* --- INTRO BOX --- */
    .intro-box {
        background: rgba(139, 0, 0, 0.1);
        border-left: 5px solid #8B0000;
        padding: 20px;
        border-radius: 0 10px 10px 0;
    }
</style>
@endsection