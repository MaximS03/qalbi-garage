<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réparations</title>
    <link rel="stylesheet" href="{{ asset('css/reparationList.css') }}">
</head>
<body>
    <div class="container-rep-list">
        <div class="page-header-rep-list">
            <h1>Liste des <span style="color:#f97316">réparations</span></h1>
            <a href="{{ route('reparations.create') }}" class="btn1">Ajouter une réparation</a>
        </div>
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="reparation-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Véhicule</th>
                            <th>Technicien</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reparations as $reparation)
                        <tr>
                            <td>{{ $reparation->id }}</td>
                            <td>{{ $reparation->vehicule->immatriculation }} {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}</td>
                            <td>{{ $reparation->technicien->nom }} {{ $reparation->technicien->prenom }}</td>
                            <td>{{ $reparation->date_debut }}</td>
                            <td>{{ $reparation->date_fin }}</td>
                            <td>{{ $reparation->description }}</td>
                            <td>
                                <a href="{{ route('reparations.edit', $reparation->id) }}" class="btn btn-outline">Modifier</a>
                                <a href="{{ route('reparations.details', $reparation->id) }}" class="btn btn-primary">Détail</a>
                                <form action="{{ route('reparations.delete', $reparation->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cette réparation ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
