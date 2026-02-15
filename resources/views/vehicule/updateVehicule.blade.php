<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/editVehicule.css') }}">
</head>

<body>

<div class="container">
    <div class="form-wrapper">
        <form action="{{ route('vehicules.update', $vehicule->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-header">
                <h2>Modifier un véhicule</h2>
            </div>

            <div class="form-content">
                <div class="form-row two-cols">
                    <div class="form-group">
                        <label for="immatriculation">Immatriculation</label>
                        <input id="immatriculation" type="text" name="immatriculation" value="{{ $vehicule->immatriculation }}" required>
                    </div>

                    <div class="form-group">
                        <label for="marque">Marque</label>
                        <input id="marque" type="text" name="marque" value="{{ $vehicule->marque }}" required>
                    </div>
                </div>

                <div class="form-row two-cols">
                    <div class="form-group">
                        <label for="modele">Modèle</label>
                        <input id="modele" type="text" name="modele" value="{{ $vehicule->modele }}" required>
                    </div>

                    <div class="form-group">
                        <label for="couleur">Couleur</label>
                        <input id="couleur" type="text" name="couleur" value="{{ $vehicule->couleur }}">
                    </div>
                </div>

                <div class="form-row two-cols">
                    <div class="form-group">
                        <label for="annee">Année</label>
                        <input id="annee" type="number" name="annee" value="{{ $vehicule->annee }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kilometrage">Kilométrage</label>
                        <input id="kilometrage" type="number" name="kilometrage" value="{{ $vehicule->kilometrage }}" required>
                    </div>
                </div>

                <div class="form-row two-cols">
                    <div class="form-group">
                        <label for="carrosserie">Carrosserie</label>
                        <input id="carrosserie" type="text" name="carrosserie" value="{{ $vehicule->carrosserie }}">
                    </div>

                    <div class="form-group">
                        <label for="energie">Énergie</label>
                        <input id="energie" type="text" name="energie" value="{{ $vehicule->energie }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="boite">Boîte</label>
                        <input id="boite" type="text" name="boite" value="{{ $vehicule->boite }}">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('vehicules.show') }}" class="back-link">Retour à la liste</a>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>