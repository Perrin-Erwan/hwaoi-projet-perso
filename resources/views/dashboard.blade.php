@extends('layouts.app')

@section('title', 'Tableau de Bord - Sagesse du Sceau')

@section('content')
<div class="dashboard-page py-5">
    <div class="container">
        
        {{-- ENTÊTE --}}
        <div class="dashboard-header mb-5 p-4 rounded shadow-lg d-flex align-items-center justify-content-between">
            <div>
                <h1 class="display-5 fw-bold text-uppercase m-0">Centre de Commandement</h1>
                <p class="text-turquoise mb-0 italic">Bienvenue, Sage {{ Auth::user()->name }}</p>
            </div>
            <div class="auth-status px-3 py-2 rounded bg-dark border border-turquoise">
                <span class="small text-uppercase fw-bold">Statut : </span>
                <span class="badge {{ Auth::user()->is_admin ? 'bg-danger' : 'bg-success' }}">
                    {{ Auth::user()->is_admin ? 'ADMINISTRATEUR' : 'GARDIEN' }}
                </span>
            </div>
        </div>

        {{-- STATISTIQUES --}}
        <div class="row g-4 mb-5 text-center">
            <div class="col-md-4">
                <div class="stat-card p-4 rounded shadow-sm border-bottom border-warning border-4">
                    <i class="fas fa-shield-alt fa-3x mb-3 text-warning"></i>
                    <h3 class="display-6 fw-bold">{{ $stats['count_guerriers'] }}</h3>
                    <p class="text-muted text-uppercase small m-0">Guerriers Consignés</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card p-4 rounded shadow-sm border-bottom border-danger border-4">
                    <i class="fas fa-skull-crossbones fa-3x mb-3 text-danger"></i>
                    <h3 class="display-6 fw-bold">{{ $stats['count_ennemis'] }}</h3>
                    <p class="text-muted text-uppercase small m-0">Menaces Identifiées</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card p-4 rounded shadow-sm border-bottom border-info border-4">
                    <i class="fas fa-users fa-3x mb-3 text-info"></i>
                    <h3 class="display-6 fw-bold">{{ $stats['count_users'] }}</h3>
                    <p class="text-muted text-uppercase small m-0">Gardiens du Sceau</p>
                </div>
            </div>
        </div>

        {{-- ACTIONS RAPIDES --}}
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card bg-dark text-white border-secondary h-100">
                    <div class="card-header border-secondary bg-transparent py-3">
                        <h5 class="m-0 text-uppercase"><i class="fas fa-history me-2"></i> Dernières Archives</h5>
                    </div>
                    <div class="card-body">
                        @if($stats['last_warrior'])
                            <div class="d-flex align-items-center p-3 border border-secondary rounded">
                                <i class="fas fa-scroll fa-2x me-3 text-turquoise"></i>
                                <div>
                                    <h6 class="m-0">{{ $stats['last_warrior']->nom }}</h6>
                                    <small class="text-muted">Dernier personnage ajouté au registre.</small>
                                </div>
                                <a href="{{ route('personnage.show', $stats['last_warrior']->nom) }}" class="ms-auto btn btn-sm btn-outline-turquoise">Voir</a>
                            </div>
                        @else
                            <p class="text-center text-muted italic">Aucun mouvement récent dans les archives.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card bg-dark text-white border-turquoise h-100">
                    <div class="card-header border-turquoise bg-transparent py-3">
                        <h5 class="m-0 text-uppercase text-turquoise text-center">Actions de Sage</h5>
                    </div>
                    <div class="card-body d-grid gap-3">
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('personnage.create') }}" class="btn btn-warning fw-bold py-2">
                                <i class="fas fa-plus me-2"></i> Ajouter un Guerrier
                            </a>
                            <a href="#" class="btn btn-danger fw-bold py-2 disabled">
                                <i class="fas fa-skull me-2"></i> Ajouter un Ennemi
                            </a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-light py-2">
                            <i class="fas fa-user-cog me-2"></i> Paramètres du Profil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-header {
        background: linear-gradient(135deg, #1a1a1a 0%, #343a40 100%);
        border-left: 5px solid #2DFFD9;
    }
    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(5px);
        transition: 0.3s;
    }
    .stat-card:hover { transform: translateY(-5px); background: rgba(255, 255, 255, 0.1); }
    .btn-outline-turquoise { border-color: #2DFFD9; color: #2DFFD9; }
    .btn-outline-turquoise:hover { background: #2DFFD9; color: #000; }
    .border-turquoise { border-color: #2DFFD9 !important; }
</style>
@endsection