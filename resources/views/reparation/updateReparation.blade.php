<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une réparation</title>
</head>
<body>

<h1>Modifier une réparation</h1>

<form action="{{ route('reparations.update', $reparation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="vehicule_id">Véhicule :</label>
    <select name="vehicule_id" id="vehicule_id" required>
        @foreach ($vehicules as $vehicule)
            <option value="{{ $vehicule->id }}" 
                {{ $vehicule->id == $reparation->vehicule_id ? 'selected' : '' }}>
                {{ $vehicule->immatriculation }} - {{ $vehicule->marque }} {{ $vehicule->modele }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label for="technicien_id">Technicien :</label>
    <select name="technicien_id" id="technicien_id">
        <option value="">-- Aucun technicien --</option>
        @foreach ($techniciens as $technicien)
            <option value="{{ $technicien->id }}" 
                {{ $technicien->id == $reparation->technicien_id ? 'selected' : '' }}>
                {{ $technicien->nom }} {{ $technicien->prenom }}
            </option>
        @endforeach
    </select>
    <br><br>

    <label for="date_debut">Date de début :</label>
    <input type="date" name="date_debut" id="date_debut" value="{{ $reparation->date_debut }}" required>
    <br><br>

    <label for="date_fin">Date de fin :</label>
    <input type="date" name="date_fin" id="date_fin" value="{{ $reparation->date_fin }}">
    <br><br>

    <label for="description">Description :</label>
    <textarea name="description" id="description" rows="4">{{ $reparation->description }}</textarea>
    <br><br>

    <button type="submit">Mettre à jour</button>
</form>

<br>
<a href="{{ route('reparations.show', $reparation->id) }}">Retour à la liste</a>

</body>
</html>
