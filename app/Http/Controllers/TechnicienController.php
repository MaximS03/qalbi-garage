<?php

namespace App\Http\Controllers;

use App\Models\Technicien;
use App\Models\Reparation;
use Illuminate\Http\Request;

class TechnicienController extends Controller
{
    /**
     * Afficher la liste des techniciens (pour /technicien/list)
     */
    public function index()
    {
        // Charger les techniciens avec leurs réparations pour éviter les n+1 queries
        $techniciens = Technicien::with('reparations.vehicule')->get();
        return view('technicien.listTechnicien', compact('techniciens'));
    }
    /**
     * Afficher la liste des techniciens
     */
    public function show()
    {
        // Charger les techniciens avec leurs réparations pour éviter les n+1 queries
        $techniciens = Technicien::with('reparations.vehicule')->get();
        return view('technicien.listTechnicien', compact('techniciens'));
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        return view('technicien.createTechnicien');
    }

    /**
     * Enregistrer un nouveau technicien
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'        => 'required|string',
            'prenom'     => 'required|string',
            'numero'     => 'required|string',
            'specialite' => 'nullable|string'
        ]);

        Technicien::create($data);

        return redirect()->route('techniciens.show')
            ->with('success', 'Technicien ajouté avec succès');
    }

    /**
     * Afficher le formulaire de modification
     */
    public function edit(Technicien $technicien)
    {
        return view('technicien.updateTechnicien', compact('technicien'));
    }

    /**
     * Mettre à jour un technicien
     */
    public function update(Request $request, Technicien $technicien)
    {
        $data = $request->validate([
            'nom'        => 'required|string',
            'prenom'     => 'required|string',
            'specialite' => 'nullable|string'
        ]);

        $technicien->update($data);

        return redirect()->route('techniciens.show')
            ->with('success', 'Technicien mis à jour');
    }

    /**
     * Supprimer un technicien
     */
    public function destroy(Technicien $technicien)
    {
        // Avant suppression, on peut soit supprimer ses réparations,
        // soit définir le technicien_id à null dans les réparations
        // Ici on fait SET NULL
        $technicien->reparations()->update(['technicien_id' => null]);

        $technicien->delete();

        return redirect()->route('techniciens.show')
            ->with('success', 'Technicien supprimé');
    }

    /**
     * Afficher les détails d'un technicien avec ses réparations
     */
    public function details(Technicien $technicien)
    {
        // Charger les réparations avec les véhicules associés
        $technicien->load('reparations.vehicule');
        return view('technicien.detailTechnicien', compact('technicien'));
    }
}
