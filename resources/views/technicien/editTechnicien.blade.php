<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un technicien</title>
    <link rel="stylesheet" href="{{ asset('css/editTechnicien.css') }}">
</head>
<body>
    <div class="container-edit-tech">
        <div class="page-header-edit-tech">
            <div class="page-title-edit-tech">Modifier <span style="color:#f97316">un technicien</span></div>
        </div>
        <form action="{{ route('techniciens.update', $technicien->id) }}" method="POST" class="form-edit-tech" id="form-edit-tech">
            @csrf
            @method('PUT')
            <input type="text" name="nom" id="nom-edit-tech" value="{{ $technicien->nom }}" required>
            <input type="text" name="prenom" id="prenom-edit-tech" value="{{ $technicien->prenom }}" required>
            <input type="text" name="numero" id="numero-edit-tech" value="{{ $technicien->numero }}" required>
            <input type="text" name="specialite" id="specialite-edit-tech" value="{{ $technicien->specialite }}">
            <button type="submit" id="btn-edit-tech">Enregistrer</button>
        </form>
        <a href="{{ route('techniciens.show') }}" class="link-edit-tech" id="link-edit-tech">Retour à la liste</a>
    </div>
</body>
</html>
