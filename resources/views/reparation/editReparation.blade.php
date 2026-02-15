<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une réparation</title>
    <link rel="stylesheet" href="{{ asset('css/editReparation.css') }}">
</head>
<body>
    <div class="container-edit-rep">
        <div class="page-header-edit-rep">
            <div class="page-title-edit-rep">Modifier <span style="color:#f97316">une réparation</span></div>
        </div>
        <form action="{{ route('reparations.update', $reparation->id) }}" method="POST" class="form-edit-rep" id="form-edit-rep">
            @csrf
            @method('PUT')
            <label for="vehicule_id">Véhicule</label>
            <select name="vehicule_id" id="vehicule_id">
                @foreach($vehicules as $vehicule)
                    <option value="{{ $vehicule->id }}" @if($reparation->vehicule_id == $vehicule->id) selected @endif>{{ $vehicule->immatriculation }}  {{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                @endforeach
            </select>
            <label for="technicien_id">Technicien</label>
            <select name="technicien_id" id="technicien_id">
                @foreach($techniciens as $technicien)
                    <option value="{{ $technicien->id }}" @if($reparation->technicien_id == $technicien->id) selected @endif>{{ $technicien->nom }} {{ $technicien->prenom }}</option>
                @endforeach
            </select>
            <input type="date" name="date_debut" id="date_debut" value="{{ $reparation->date_debut }}" required>
            <input type="date" name="date_fin" id="date_fin" value="{{ $reparation->date_fin }}" required>
            <textarea name="description" id="description" placeholder="Description de la réparation">{{ $reparation->description }}</textarea>
            <button type="submit" id="btn-edit-rep">Enregistrer</button>
        </form>
        <a href="{{ route('reparations.show') }}" class="link-edit-rep" id="link-edit-rep">Retour à la liste</a>
    </div>
</body>
</html>
