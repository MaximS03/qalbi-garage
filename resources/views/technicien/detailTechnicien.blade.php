<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail technicien</title>
    <link rel="stylesheet" href="{{ asset('css/detailTechnicien.css') }}">
</head>
<body>
    <div class="container-detail-tech">
        <div class="page-header-detail-tech">
            <div class="page-title-detail-tech">Détail <span style="color:#f97316">technicien</span></div>
        </div>
        <div class="detail-section-tech">
            <div class="section-title-tech">Informations</div>
            <p><strong>Nom :</strong> {{ $technicien->nom }}</p>
            <p><strong>Prénom :</strong> {{ $technicien->prenom }}</p>
            <p><strong>Numéro de téléphone :</strong> {{ $technicien->numero }}</p>
            <p><strong>Spécialité :</strong> {{ $technicien->specialite }}</p>
        </div>
        <a href="{{ route('techniciens.index') }}" class="link-detail-tech">Retour à la liste</a>
    </div>
</body>
