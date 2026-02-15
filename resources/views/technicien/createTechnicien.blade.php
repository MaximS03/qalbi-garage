<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un technicien</title>
    <link rel="stylesheet" href="{{ asset('css/technicienCreate.css') }}">
</head>
<body>
    <div class="container-tech">
        <div class="page-header-tech">
            <div class="page-title-tech">Ajouter <span style="color:#f97316">un technicien</span></div>
        </div>
        <form action="{{ route('techniciens.store') }}" method="POST" class="form-tech" id="form-tech">
            @csrf
            <input type="text" name="nom" id="nom-tech" placeholder="Entrez le nom" required>
            @error('nom')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <input type="text" name="prenom" id="prenom-tech" placeholder="Entrez le prénom" required>
            <input type="text" name="numero" id="numero-tech" placeholder="Entrez le numéro de téléphone" required>
            <button type="submit" id="btn-tech">Enregistrer</button>
        </form>
        <a href="{{ route('techniciens.show') }}" class="link-tech" id="link-tech">Voir les techniciens</a>
    </div>
</body>