<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnage;
use App\Models\TechniqueIndividuelle; 
use App\Models\Arme;
use App\Models\CombatStyle;
 use Illuminate\Support\Facades\Storage; 


class PersonnageController extends Controller
{
    /**
     * Affiche la page d'accueil avec 3 personnages aléatoires et les boutons de navigation principaux.
     */
    public function accueil()
    {
        $personnagesAleatoires = Personnage::inRandomOrder()->limit(3)->get();
        return view('accueil', compact('personnagesAleatoires'));
    }
    
    /**
     * Affiche la liste complète de tous les personnages (route personnage.list).
     */
    public function index()
    {
        $personnages = Personnage::orderBy('coeurs_base', 'desc')->get();
        return view('personnage.list', compact('personnages')); 
    }

    /**
     * Affiche la fiche détaillée d'un seul personnage et charge les voisins pour la navigation.
     * Utilise le Route Model Binding: l'objet Personnage est automatiquement chargé.
     */
    public function show(Personnage $personnage)
    {
        // 1. Chargement des relations nécessaires pour la vue
        // Le Route Model Binding a déjà chargé l'objet $personnage.
        $personnage->load([
            'combatStyle', 
            'armes', 
            
            // ⚠️ ATTENTION : Si le nom de la relation est au singulier (attaqueSynchro), 
            // c'est ce qui crée l'erreur SQL. Assurez-vous que le Modèle AttaqueSynchro 
            // a bien 'protected $table = "attaques_synchro";'
            'attaqueSynchro', 
            'attaqueSynchro.partenaireRel',
            'attaquesEnTantQuePartenaire.personnage', 
            
            // Relation Many-to-Many avec la table pivot contenant 'mastery_level'
            'combatStyle.techniques' => function ($query) {
                 $query->withPivot('mastery_level'); 
             },
            
            'techniquesIndividuelles', 
        ]);
        
        // --- Navigation Voisine ---
        
        // 2. Trouver le personnage PRÉCÉDENT
        // On utilise l'ID pour trouver le précédent par ID (méthode la plus fiable)
        $previousPersonnage = Personnage::where('id', '<', $personnage->id)
                                        ->orderBy('id', 'desc')
                                        ->first();

        // 3. Trouver le personnage SUIVANT
        $nextPersonnage = Personnage::where('id', '>', $personnage->id)
                                    ->orderBy('id', 'asc')
                                    ->first();
                                    
        // --- Transmission des données ---
        
        // 4. Passer toutes les données à la vue
        // On passe le personnage chargé, la navigation, et la relation des attaques synchro
        return view('personnage.show', compact(
            'personnage', 
            'previousPersonnage', 
            'nextPersonnage'
            // NOTE : La relation 'attaqueSynchro' est maintenant disponible dans la vue via :
            // $personnage->attaqueSynchro (si la relation existe)
            // ou $personnage->attaquesSynchroEnPartenariat (si l'autre relation existe)
        ));
    }

    public function create()
{
    return view('personnages.create'); // On va créer cette vue juste après
}

public function store(Request $request)
{
    // 1. Validation (Même logique que update, mais le nom doit être unique sans exception)
    $request->validate([
        'nom' => 'required|string|max:255|unique:personnage,nom',
        'alias' => 'nullable|string|max:255',
        'description_courte' => 'nullable|string|max:255',
        'description' => 'required|string',
        'role' => 'nullable|string|max:255',
        'coeurs_base' => 'required|integer|min:1',
        'arme_principale' => 'required|string|max:255',
        'element' => 'nullable|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $personnage = new Personnage();

    // 2. Gestion de l'image
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('personnages', $imageName, 'public');
        $personnage->image_path = $imageName;
    }

    // 3. Remplissage des données
    $personnage->fill($request->only([
        'nom', 'alias', 'description_courte', 'description', 'role', 
        'coeurs_base', 'arme_principale', 'element'
    ]));

    $personnage->save();

    return redirect()->route('personnage.list')->with('success', 'Le nouveau guerrier a été consigné dans les archives !');
}
    /**
     * Affiche le formulaire pour modifier un personnage existant.
     * 💡 AMÉLIORATION: Utilise le Route Model Binding (Personnage $personnage).
     */
    public function edit(Personnage $personnage)
{
    // Chargez les relations si nécessaire
    $personnage->load(['combatStyle', 'armes', 'techniques']);
    
    // Retournez la vue du formulaire d'édition
    return view('personnage.edit', compact('personnage'));
}

    /**
     * Met à jour le personnage dans la base de données.
     * 💡 AMÉLIORATION: Utilise le Route Model Binding (Personnage $personnage).
     */
   
public function update(Request $request, Personnage $personnage)
{
    // 1. Validation des données (on ajoute la règle pour l'image)
    $request->validate([
        'nom' => 'required|string|max:255|unique:personnage,nom,' . $personnage->id . ',id', 
        'alias' => 'nullable|string|max:255',
        'description_courte' => 'nullable|string|max:255',
        'description' => 'required|string',
        'role' => 'nullable|string|max:255',
        'coeurs_base' => 'required|integer|min:1',
        'arme_principale' => 'required|string|max:255',
        'element' => 'nullable|string|max:255',
        // Règle pour l'image : max 2Mo, types autorisés
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    // 2. Gestion de l'image (Upload)
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image du disque si elle existe
        if ($personnage->image_path) {
            Storage::disk('public')->delete('personnages/' . $personnage->image_path);
        }

        // Créer un nom unique (ex: 171456789.png) et stocker dans storage/app/public/personnages
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('personnages', $imageName, 'public');

        // Mettre à jour le chemin dans l'objet personnage
        $personnage->image_path = $imageName;
    }

    // 3. Remplir et sauvegarder les données textuelles
    $personnage->fill($request->only([
        'nom', 'alias', 'description_courte', 'description', 'role', 
        'coeurs_base', 'arme_principale', 'element'
    ]));

    $personnage->save();

    // 4. Redirection vers la page de détail mise à jour
    return redirect()->route('personnage.show', ['personnage' => $personnage->nom])
                    ->with('success', 'Le personnage ' . $personnage->nom . ' a été mis à jour avec succès !');
}
    
    // ... (systemeJeu method)
    
    /**
     * Synchronise les techniques apprises du guerrier avec les données du formulaire.
     */
    public function syncTechniques(Request $request, Personnage $personnage)
{
    $techniquesIds = $request->input('techniques', []);

    // 🚨 CORRECTION : Utiliser le nom réel de la relation dans le modèle
    $personnage->techniques()->sync($techniquesIds); 

    return redirect()
        ->route('personnage.show', ['nom_personnage' => $personnage->nom])
        ->with('success', 'La liste des techniques apprises a été mise à jour.');
}

    public function systemeJeu()
    {
        return view('systeme-jeu');
    }

    public function attaqueSynchro()
    {
        return redirect()->route('personnage.show', ['personnage_id' => 'attaque-synchro']);
    }

    public function artefactsSoneaux()
    {
        return redirect()->route('personnage.show', ['personnage_id' => 'artefactsSoneaux']);
    }

    public function attaquesAmalgamees()
    {
        return redirect()->route('personnage.show', ['personnage_id' => 'attaquesAmalgamees']);
    }

    public function styles() {
        $personnages = Personnage::all();
        return view('styles-combat.index', compact('personnages'));
    }
}