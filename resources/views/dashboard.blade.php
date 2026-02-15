<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Garage</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<div class="container">
    <h1>Dashboard du Garage</h1>

    <h2>Statistiques</h2>
    <ul class="stats">
        <li>Véhicules<br><strong>{{ $vehicules }}</strong></li>
        <li>Techniciens<br><strong>{{ $techniciens }}</strong></li>
        <li>Réparations<br><strong>{{ $reparations }}</strong></li>
    </ul>

    <h2>Dernières réparations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Véhicule</th>
                <th>Technicien</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($latestReparations as $rep)
            <tr>
                <td>{{ $rep->id }}</td>
                <td>
                    {{ $rep->vehicule->immatriculation ?? 'N/A' }}<br>
                    <small>{{ $rep->vehicule->marque ?? '' }} {{ $rep->vehicule->modele ?? '' }}</small>
                </td>
                <td>
                    {{ $rep->technicien->nom ?? 'Non assigné' }}
                    {{ $rep->technicien->prenom ?? '' }}
                </td>
                <td>{{ $rep->date_debut }}</td>
                <td>{{ $rep->date_fin }}</td>
                <td>{{ $rep->description }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="empty">Aucune réparation récente.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="links">
        <a href="{{ route('vehicules.show') }}">Voir tous les véhicules</a>
        <a href="{{ route('techniciens.show') }}">Voir tous les techniciens</a>
        <a href="{{ route('reparations.show') }}">Voir toutes les réparations</a>
    </div>
</div>
</body>
</html>