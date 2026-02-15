<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QALBI AutoCare - Liste des Véhicules</title>
    <link rel="stylesheet" href="{{ asset('css/vehiculeList.css') }}">
</head>
<body>

<div class="container">
    <div class="page-header">
        <div>
            <h1>Liste des véhicules</h1>
            <p class="muted">Tous les véhicules enregistrés dans le garage</p>
        </div>
        <div>
            <a href="{{ route('vehicules.create') }}" class="btn1">Ajouter un véhicule</a>
        </div>
    </div>

    <div class="table-wrapper">
        <div class="table-responsive">
            <table class="vehicle-table" aria-describedby="vehicules-list">
                <thead>
                    <tr>
                        <th class="col-num">#</th>
                        <th class="col-immatriculation">Immatriculation</th>
                        <th class="col-marque">Marque</th>
                        <th>Modèle</th>
                        <th>Couleur</th>
                        <th>Année</th>
                        <th>Kilométrage</th>
                        <th>Carrosserie</th>
                        <th>Énergie</th>
                        <th>Boîte</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($vehicules as $index => $vehicule)
                    <tr>
                        <td class="col-num">{{ $index + 1 }}</td>
                        <td class="col-immatriculation">{{ $vehicule->immatriculation }}</td>
                        <td class="col-marque">{{ $vehicule->marque }}</td>
                        <td>{{ $vehicule->modele }}</td>
                        <td>{{ $vehicule->couleur }}</td>
                        <td>{{ $vehicule->annee }}</td>
                        <td>{{ $vehicule->kilometrage }}</td>
                        <td>{{ $vehicule->carrosserie }}</td>
                        <td>{{ $vehicule->energie }}</td>
                        <td>{{ $vehicule->boite }}</td>

                        <td>
                            <div class="actions">
                                <a href="{{ route('vehicules.detail', $vehicule->id) }}" class="btn btn-view" title="Détails">Détails</a>
                                <a href="{{ route('vehicules.edit', $vehicule->id) }}" class="btn btn-edit">Modifier</a>

                                <form action="{{ route('vehicules.delete', $vehicule->id) }}" method="POST" onsubmit="return confirm('Supprimer ce véhicule ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>