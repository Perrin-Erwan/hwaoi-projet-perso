{{-- Fichier : resources/views/techniques/index.blade.php --}}

@extends('layouts.app')

@section('title', 'Liste des Techniques Individuelles')

@section('content')
    <h1 class="mb-4">
        <i class="fas fa-magic"></i> Techniques Individuelles
        <span class="badge bg-secondary">{{ $techniques->count() }}</span>
    </h1>
    
    <p class="lead">Répertoire complet des techniques spéciales utilisées par les Guerriers d'Hyrule.</p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Technique</th>
                    <th scope="col">Dégâts</th>
                    <th scope="col">Personnage spécifique</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($techniques as $technique)
                    <tr>
                        <td class="fw-bold">{{ $technique->nom }}</td>
                        <td>
                            @if ($technique->dégâts == 0)
                                <span class="badge bg-success">Défensif / Utilitaire</span>
                            @else
                                <span class="badge bg-danger">{{ $technique->dégâts }}</span>
                            @endif
                        </td>
                        <td>
                            {{-- Affiche le nom du personnage si la relation existe --}}
                            @if ($technique->personnageSpecifique)
                                <a href="{{ route('personnage.show', $technique->personnageSpecifique) }}" class="text-decoration-none">
                                    {{ $technique->personnageSpecifique->nom }}
                                </a>
                            @else
                                <span class="text-muted">Générique</span>
                            @endif
                        </td>
                        <td>{{ $technique->description }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucune technique individuelle trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection