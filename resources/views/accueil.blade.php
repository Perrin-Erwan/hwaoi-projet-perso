@extends('layouts.app')

@section('title', 'Accueil - Chroniques du Sceau')

@section('content')
<div class="warriors-page">
    {{-- HERO SECTION : TITRE ÉPIQUE --}}
    <div class="hero-banner text-center py-5 mb-5">
        <div class="container">
            <div class="logo-container mb-4">
                <h1 class="display-3 fw-bold title-hyrule">HYRULE <span class="title-warriors">WARRIORS</span></h1>
                <h2 class="h4 fw-light text-white subtitle-chroniques">Les Chroniques du Sceau</h2>
            </div>
            
            <div class="intro-box-home mx-auto col-md-8 mt-4">
                <h2 class="display-5 italic text-turquoise mb-3">L'Ère des Légendes</h2>
                <p class="lead text-white-50">
                    Plongez dans les récits héroïques de la Guerre du Sceau. 
                    Maîtrisez les armes ancestrales, forgez des alliances et gravez votre nom dans l'histoire du Royaume d'Hyrule.
                </p>
                <div class="mt-3">
                    <span class="text-warning">★</span> 
                    <strong class="text-white">Incarnez des guerriers légendaires</strong> et exploitez la puissance des amalgames !
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        {{-- BOUTONS D'ACTION PRINCIPAUX --}}
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <a href="{{ route('personnage.list') }}" class="btn-main-action btn-guerriers">
                    <div class="action-icon"><i class="fas fa-users"></i></div>
                    <div class="action-text">
                        <span class="action-title">L'ARMÉE ROYALE</span>
                        <span class="action-sub">Liste des Guerriers</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('ennemis.index') }}" class="btn-main-action btn-bestiaire">
                    <div class="action-icon"><i class="fas fa-dragon"></i></div>
                    <div class="action-text">
                        <span class="action-title">LE BESTIAIRE</span>
                        <span class="action-sub">Menaces du Sceau</span>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('systeme-jeu') }}" class="btn-main-action btn-systeme">
                    <div class="action-icon"><i class="fas fa-scroll"></i></div>
                    <div class="action-text">
                        <span class="action-title">SYSTÈME DE JEU</span>
                        <span class="action-sub">Règles et Combat</span>
                    </div>
                </a>
            </div>
        </div>

        <hr class="border-secondary opacity-25 my-5">

        {{-- APERÇU ALÉATOIRE : GUERRIERS EN VEDETTE --}}
        <div class="section-title-wrapper mb-4">
            <h2 class="section-title"><i class="fas fa-bolt text-warning me-2"></i> GUERRIERS EN VEDETTE</h2>
            <div class="title-line"></div>
        </div>

        @if ($personnagesAleatoires->count() > 0)
            <div class="row g-4 mb-5">
                @foreach ($personnagesAleatoires as $personnage)
                    <div class="col-md-4">
                        <div class="character-card">
                            <div class="card-image-wrapper">
                                @if ($personnage->image_path)
                                    <img src="{{ asset('images/personnages/' . $personnage->image_path) }}" 
                                         class="char-img" alt="{{ $personnage->nom }}">
                                @endif
                                <div class="char-overlay"></div>
                                <div class="char-name-badge">
                                    <h5 class="m-0 fw-bold">{{ $personnage->nom }}</h5>
                                    <small class="text-turquoise">{{ $personnage->role ?? 'Guerrier' }}</small>
                                </div>
                            </div>
                            <div class="card-body p-3 text-center">
                                <a href="{{ route('personnage.show', ['personnage' => $personnage->nom]) }}" 
                                   class="btn btn-view-profile w-100">
                                   CONSULTER LA FICHE
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert bg-dark text-white border-warning text-center">
                Aucun guerrier n'est actuellement consigné dans les archives.
            </div>
        @endif
    </div>
</div>

<style>
    /* --- FOND ET BASE --- */
    body {
        background: radial-gradient(circle at center, #2b1d16 0%, #0c0c0c 100%) !important;
        background-attachment: fixed !important;
        color: #ffffff;
    }

    .text-turquoise { color: #2DFFD9; }
    .italic { font-style: italic; }

    /* --- LOGO CONCEPT --- */
    .logo-container {
        background-color: #8B0000;
        display: inline-block;
        padding: 25px 60px;
        border-radius: 10px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.6);
        border-bottom: 5px solid #5a0000;
    }
    .title-hyrule { color: #FFFFFF; letter-spacing: 3px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
    .title-warriors { color: #2DFFD9; text-shadow: 0 0 15px rgba(45, 255, 217, 0.6); font-style: italic; }
    .subtitle-chroniques { letter-spacing: 6px; text-transform: uppercase; opacity: 0.9; }

    /* --- HERO INTRO --- */
    .intro-box-home {
        background: rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.1);
        padding: 30px;
        border-radius: 15px;
        backdrop-filter: blur(5px);
    }

    /* --- BOUTONS D'ACTION --- */
    .btn-main-action {
        display: flex;
        align-items: center;
        padding: 20px;
        border-radius: 12px;
        text-decoration: none;
        color: white;
        transition: all 0.3s ease;
        border: 1px solid rgba(255,255,255,0.1);
        height: 100%;
        background: rgba(255,255,255,0.05);
    }

    .btn-main-action:hover {
        transform: translateY(-5px);
        color: white;
        box-shadow: 0 10px 20px rgba(0,0,0,0.4);
    }

    .action-icon {
        font-size: 2.5rem;
        margin-right: 20px;
        opacity: 0.8;
    }

    .action-title { display: block; font-weight: bold; font-size: 1.2rem; letter-spacing: 1px; }
    .action-sub { font-size: 0.8rem; opacity: 0.6; text-transform: uppercase; }

    .btn-guerriers:hover { border-color: #8B0000; background: rgba(139, 0, 0, 0.2); }
    .btn-bestiaire:hover { border-color: #ff8c00; background: rgba(255, 140, 0, 0.2); }
    .btn-systeme:hover { border-color: #2DFFD9; background: rgba(45, 255, 217, 0.2); }

    /* --- CARDS --- */
    .character-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        overflow: hidden;
        transition: 0.3s;
    }
    .character-card:hover { border-color: #2DFFD9; transform: scale(1.02); }

    .card-image-wrapper { position: relative; height: 300px; overflow: hidden; }
    .char-img { width: 100%; height: 100%; object-fit: cover; }
    .char-overlay {
        position: absolute; bottom: 0; left: 0; width: 100%; height: 50%;
        background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
    }
    .char-name-badge { position: absolute; bottom: 15px; left: 15px; }

    .btn-view-profile {
        background: transparent;
        border: 1px solid rgba(255,255,255,0.2);
        color: #fff;
        font-weight: bold;
        transition: 0.3s;
    }
    .character-card:hover .btn-view-profile { background: #2DFFD9; color: #000; border-color: #2DFFD9; }

    /* --- TITRE DE SECTION --- */
    .section-title { font-weight: bold; letter-spacing: 2px; }
    .title-line { height: 3px; width: 60px; background: #8B0000; margin-top: 10px; }
</style>
@endsection