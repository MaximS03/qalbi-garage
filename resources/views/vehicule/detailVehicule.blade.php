<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du véhicule</title>
    <link rel="stylesheet" href="{{ asset('css/detailVehicule.css') }}">
</head>
<body>
<div class="container">
    <div class="detail-card">
        <div class="detail-top">
            <a href="{{ route('vehicules.show') }}" class="btn btn-view">← Retour à la liste</a>
        </div>
        <div class="detail-inner">
            <div class="card-main">
                <div class="card-header">
                    <h2>Détails du véhicule</h2>
                </div>
                <div class="card-body">
                    <div class="detail-row"><span class="label">Immatriculation</span><span class="value">{{ $vehicule->immatriculation }}</span></div>
                    <div class="detail-row"><span class="label">Marque</span><span class="value">{{ $vehicule->marque }}</span></div>
                    <div class="detail-row"><span class="label">Modèle</span><span class="value">{{ $vehicule->modele }}</span></div>
                    <div class="detail-row"><span class="label">Couleur</span><span class="value">{{ $vehicule->couleur }}</span></div>
                    <div class="detail-row"><span class="label">Année</span><span class="value">{{ $vehicule->annee }}</span></div>
                    <div class="detail-row"><span class="label">Kilométrage</span><span class="value">{{ $vehicule->kilometrage }}</span></div>
                    <div class="detail-row"><span class="label">Carrosserie</span><span class="value">{{ $vehicule->carrosserie }}</span></div>
                    <div class="detail-row"><span class="label">Énergie</span><span class="value">{{ $vehicule->energie }}</span></div>
                    <div class="detail-row"><span class="label">Boîte</span><span class="value">{{ $vehicule->boite }}</span></div>
                    <div class="actions">
                        <a href="{{ route('vehicules.edit', $vehicule->id) }}" class="btn btn-edit">Modifier</a>
                        <form action="{{ route('vehicules.delete', $vehicule->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Voulez-vous vraiment supprimer ce véhicule ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-side">
                <div class="side-section">
                    <h3>Réparations récentes</h3>
                    @if(isset($vehicule->reparations) && count($vehicule->reparations))
                        <div class="rep-list">
                            @foreach($vehicule->reparations as $rep)
                                <div class="rep-item">
                                    <div class="date">{{ $rep->date_debut ? $rep->date_debut->format('d/m/Y') : '' }}</div>
                                    <div class="desc">{{ $rep->description }}</div>
                                    <div class="muted">Technicien : {{ $rep->technicien->nom ?? '-' }}</div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="muted">Aucune réparation enregistrée.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
