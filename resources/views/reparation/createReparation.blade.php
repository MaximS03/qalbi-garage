<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle réparation</title>
    <link rel="stylesheet" href="{{ asset('css/reparationCreate.css') }}">
</head>
<body>
    <div class="container-rep">
        <div class="page-header-rep">
            <div class="page-title-rep">Nouvelle <span style="color:#f97316">réparation</span></div>
        </div>
        <form action="{{ route('reparations.store') }}" method="POST" class="form-rep" id="form-rep">
            @csrf
            <label for="vehicule_id">Véhicule</label>
            <select name="vehicule_id" id="vehicule_id">
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}">{{ $vehicule->immatriculation }}  {{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                @endforeach
            </select>
            <label for="technicien_id">Technicien</label>
            <select name="technicien_id" id="technicien_id">
                @foreach($techniciens as $technicien)
                    <option value="{{ $technicien->id }}">{{ $technicien->nom }} {{ $technicien->prenom }}</option>
                @endforeach
            </select>
            <input type="date" name="date_debut" id="date_debut" placeholder="Date de début" required>
            <input type="date" name="date_fin" id="date_fin" placeholder="Date de fin" required>
            <textarea name="description" id="description" placeholder="Description de la réparation"></textarea>
            <button type="submit" id="btn-rep">Enregistrer</button>
        </form>
        <a href="{{ route('reparations.show') }}" class="link-rep" id="link-rep">Voir les réparations</a>
    </div>
</body>
</html>