<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QALBI AutoCare - Ajouter un Véhicule</title>
    <link rel="stylesheet" href="{{ asset('css/vehiculeCreate.css') }}">
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title"><span>QALBI</span> AutoCare</h1>
        </div>

        <form action="{{ route('vehicules.store') }}" method="POST">
            <div class="form-header">
                <h2>Ajouter un nouveau véhicule</h2>
                <p>Remplissez tous les champs pour ajouter un véhicule à la flotte</p>
            </div>

            <div class="form-content">
                @csrf

                <div class="form-section">
                    <div class="section-title">
                        <span class="section-icon">1</span>
                        Informations principales
                    </div>

                    <div class="form-row three-cols">
                        <div class="form-group">
                            <label for="immatriculation">Immatriculation <span class="required">*</span></label>
                            <input type="text" id="immatriculation" name="immatriculation" placeholder="Ex: AB-123-CD" required>
                            @error('immatriculation')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="marque">Marque <span class="required">*</span></label>
                            <input type="text" id="marque" name="marque" placeholder="Ex: Toyota" required>
                            @error('marque')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="modele">Modèle <span class="required">*</span></label>
                            <input type="text" id="modele" name="modele" placeholder="Ex: Corolla" required>
                            @error('modele')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <div class="section-title">
                        <span class="section-icon">2</span>
                        Caractéristiques techniques
                    </div>

                    <div class="form-row three-cols">
                        <div class="form-group">
                            <label for="couleur">Couleur <span class="required">*</span></label>
                            <input type="text" id="couleur" name="couleur" placeholder="Ex: Blanc" required>
                            @error('couleur')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="annee">Année <span class="required">*</span></label>
                            <input type="number" id="annee" name="annee" placeholder="Ex: 2023" min="1980" max="2099" required>
                            @error('annee')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kilometrage">Kilométrage <span class="required">*</span></label>
                            <input type="number" id="kilometrage" name="kilometrage" placeholder="Ex: 50000" min="0" required>
                            @error('kilometrage')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row three-cols">
                        <div class="form-group">
                            <label for="carrosserie">Carrosserie <span class="required">*</span></label>
                            <input type="text" id="carrosserie" name="carrosserie" placeholder="Ex: SUV" required>
                            @error('carrosserie')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="energie">Énergie <span class="required">*</span></label>
                            <select id="energie" name="energie" required>
                                <option value="">Sélectionner une énergie</option>
                                <option value="Essence">Essence</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Électrique">Électrique</option>
                                <option value="Hybride">Hybride</option>
                            </select>
                            @error('energie')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="boite">Boîte de vitesse <span class="required">*</span></label>
                            <select id="boite" name="boite" required>
                                <option value="">Sélectionner une boîte</option>
                                <option value="Manuelle">Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                            @error('boite')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="javascript:history.back()">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer véhicule</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>