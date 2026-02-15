<?php

namespace App\Http\Controllers;

use App\Models\Vehicules;
use Illuminate\Http\Request;

class VehiculesController extends Controller
{
    /**
     * Afficher la liste des véhicules
     */
    public function show()
    {
        // Charger les véhicules avec leurs réparations pour éviter les n+1 queries
        $vehicules = Vehicules::with('reparations.technicien')->get();
        return view('vehicule.listVehicule', compact('vehicules'));
    }

    /**
     * Afficher le formulaire de création d'un véhicule
     */
    public function create()
    {
        return view('vehicule.createVehicule');
    }

    /**
     * Enregistrer un nouveau véhicule
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'immatriculation' => 'required|unique:vehicules,immatriculation',
            'marque'          => 'required|string',
            'modele'          => 'required|string',
            'couleur'         => 'nullable|string',
            'annee'           => 'nullable|integer',
            'kilometrage'     => 'nullable|integer',
            'carrosserie'     => 'nullable|string',
            'energie'         => 'nullable|string',
            'boite'           => 'nullable|string',
        ], [
            'immatriculation.unique' => 'Cette immatriculation est déjà utilisée.',
        ]);

        Vehicules::create($data);

        return redirect()->route('vehicules.show')
            ->with('success', 'Véhicule ajouté avec succès.');
    }

    /**
     * Afficher le formulaire de modification d'un véhicule
     */
    public function edit(Vehicules $vehicule)
    {
        return view('vehicule.updateVehicule', compact('vehicule'));
    }

    /**
     * Mettre à jour un véhicule
     */
    public function update(Request $request, Vehicules $vehicule)
    {
        $data = $request->validate([
            'immatriculation' => 'required|unique:vehicules,immatriculation,' . $vehicule->id,
            'marque'          => 'required|string',
            'modele'          => 'required|string',
            'couleur'         => 'nullable|string',
            'annee'           => 'nullable|integer',
            'kilometrage'     => 'nullable|integer',
            'carrosserie'     => 'nullable|string',
            'energie'         => 'nullable|string',
            'boite'           => 'nullable|string',
        ]);

        $vehicule->update($data);

        return redirect()->route('vehicules.show')
            ->with('success', 'Véhicule mis à jour avec succès.');
    }

    /**
     * Supprimer un véhicule
     */
    public function destroy(Vehicules $vehicule)
    {
        // Avant suppression, supprimer toutes les réparations associées
        $vehicule->reparations()->delete();

        $vehicule->delete();

        return redirect()->route('vehicules.show')
            ->with('success', 'Véhicule supprimé avec succès.');
    }

    /**
     * Afficher les détails d'un véhicule
     */
    public function detail(Vehicules $vehicule)
    {
        // Charger les réparations associées avec les techniciens
        $vehicule->load('reparations.technicien');

        return view('vehicule.detailVehicule', compact('vehicule'));
    }
}
