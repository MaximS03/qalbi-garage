<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Technicien;
use App\Models\Vehicules;
use Illuminate\Http\Request;

class ReparationController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ici tu utilises show pour afficher toutes les réparations.
     */
    public function show()
    {
        $reparations = Reparation::with(['vehicule', 'technicien'])->get();
        return view('reparation.listReparation', compact('reparations'));
    }
        /**
         * Afficher la liste des réparations (route index)
         */
        public function index()
        {
            $reparations = Reparation::with(['vehicule', 'technicien'])->get();
            return view('reparation.listReparation', compact('reparations'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicules = Vehicules::all();
        $techniciens = Technicien::all();
        return view('reparation.createReparation', compact('vehicules', 'techniciens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'description' => 'nullable|string',
        ]);

        Reparation::create($data);

        return redirect()->route('reparations.show')->with('success', 'Réparation ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function details(Reparation $reparation)
    {
        return view('reparation.detailReparation', compact('reparation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reparation $reparation)
    {
        $vehicules = Vehicules::all();
        $techniciens = Technicien::all();
        return view('reparation.updateReparation', compact('reparation', 'vehicules', 'techniciens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reparation $reparation)
    {
        $data = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'technicien_id' => 'nullable|exists:techniciens,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'description' => 'nullable|string',
        ]);

        $reparation->update($data);

        return redirect()->route('reparations.show')->with('success', 'Réparation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reparation $reparation)
    {
        $reparation->delete();
        return redirect()->route('reparations.show')->with('success', 'Réparation supprimée avec succès.');
    }
}
