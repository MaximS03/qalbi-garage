<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des techniciens</title>
    <link rel="stylesheet" href="{{ asset('css/technicienList.css') }}">
</head>
<body>
    <div class="container-tech-list">
        <div class="page-header-tech-list">
            <h1>Techniciens <span style="color:#f97316">enregistrés</span> dans le garage</h1>
            <a href="{{ route('techniciens.create') }}" class="btn1">Ajouter un technicien</a>
        </div>
        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="technicien-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Numéro de téléphone</th>
                            <th>Spécialité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($techniciens as $technicien)
                        <tr>
                            <td>{{ $technicien->id }}</td>
                            <td>{{ $technicien->nom }}</td>
                            <td>{{ $technicien->prenom }}</td>
                            <td>{{ $technicien->numero }}</td>
                            <td>{{ $technicien->specialite }}</td>
                            <td>
                                <a href="{{ route('techniciens.edit', $technicien->id) }}" class="btn btn-outline">Modifier</a>
                                <a href="{{ route('techniciens.details', $technicien->id) }}" class="btn btn-primary">Détail</a>
                                <form action="{{ route('techniciens.delete', $technicien->id) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce technicien ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
