<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail réparation</title>
    <link rel="stylesheet" href="{{ asset('css/detailReparation.css') }}">
</head>
<body>
    <div class="container-detail-rep">
        <div class="page-header-detail-rep">
            <div class="page-title-detail-rep">Détail <span style="color:#f97316">réparation</span></div>
        </div>
        <div class="detail-section-rep">
            <div class="section-title-rep">Informations</div>
            <p><strong>Véhicule :</strong> {{ $reparation->vehicule->immatriculation }} {{ $reparation->vehicule->marque }} {{ $reparation->vehicule->modele }}</p>
            <p><strong>Technicien :</strong> @if ($reparation->technicien) {{ $reparation->technicien->nom }} {{ $reparation->technicien->prenom }} @else <em>Aucun technicien assigné</em> @endif</p>
            <p><strong>Date de début :</strong> {{ $reparation->date_debut }}</p>
            <p><strong>Date de fin :</strong> {{ $reparation->date_fin }}</p>
            <p><strong>Description :</strong> {{ $reparation->description }}</p>
        </div>
        <a href="{{ route('reparations.index') }}" class="link-detail-rep">Retour à la liste</a>
    </div>
</body>
