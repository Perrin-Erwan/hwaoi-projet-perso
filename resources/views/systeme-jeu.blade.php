<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Système de Jeu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">🔍 Système de Jeu et Règles de Combat</h1>
            <a href="{{ route('personnage.list') }}" class="btn btn-outline-secondary">
                ← Retour à la liste des Personnages
            </a>
        </div>

        <hr>

        <div class="row">
            
            {{-- SECTION 1 : CLASSIFICATION DES ARMES --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-warning text-dark">
                        ## Armes & Types
                    </div>
                    <div class="card-body">
                        <p>Le système de combat repose sur la classification des armes, qui détermine les types d'attaques disponibles et la portée des personnages. Un personnage peut utiliser :</p>
                        <ul>
                            <li>**Armes Uniques :** Armes spécifiques à un personnage (ex : Épée de lumière de Zelda).</li>
                            <li>**Armes Génériques :** Armes disponibles pour tout personnage ayant la licence pour ce **Type**.</li>
                        </ul>
                        <p>Les types d'armes génériques que nous avons définis sont :</p>
                        <div class="list-group">
                            <li class="list-group-item">**Arme à une main (1M) :** Équilibre entre vitesse et puissance.</li>
                            <li class="list-group-item">**Arme à deux mains (2M) :** Lenteur contre dégâts bruts.</li>
                            <li class="list-group-item">**Lance (L) :** Portée et vitesse d'attaque élevées.</li>
                            <li class="list-group-item">**Arc (A) :** Attaques à distance (Raphica).</li>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2 : TECHNIQUES & SYNERGIE --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-danger text-white">
                        ## Techniques et Attaques Synchro
                    </div>
                    <div class="card-body">
                        <p>Le système de jeu utilise deux mécanismes clés pour les attaques spéciales :</p>
                        
                        <h5>Techniques Individuelles</h5>
                        <p>Ce sont des attaques propres à un personnage. Elles sont toujours disponibles et ne nécessitent pas de partenaire.</p>
                        
                        <h5>Attaques Synchro (Synergie)</h5>
                        <p>Ces attaques requièrent un partenaire désigné pour être exécutées. Elles sont classées en deux catégories :</p>
                        <ul>
                            <li>**Normale :** Attaque synchronisée de base entre les deux personnages.</li>
                            <li>**Spéciale :** Attaque synchronisée plus puissante, souvent liée à un événement ou à un niveau de relation élevé.</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div> {{-- Fin row --}}
        
        {{-- SECTION 3 : ÉLÉMENTS ET RÔLES (Optionnel) --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                ## Autres Concepts Clés
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Éléments :</strong> Les armes et les personnages peuvent être associés à des éléments (Feu, Glace, Lumière, etc.) qui confèrent des bonus et des faiblesses contre certains ennemis.
                    </div>
                    <div class="col-md-6">
                        <strong>Cœurs de base :</strong> Indiquent la santé de départ du personnage.
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>