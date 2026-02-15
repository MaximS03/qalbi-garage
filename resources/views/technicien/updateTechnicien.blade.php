<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('techniciens.update', $technicien->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="nom" value="{{ old('nom', $technicien->nom) }}">
    <input type="text" name="prenom" value="{{ old('prenom', $technicien->prenom) }}">
    <input type="text" name="numero" value="{{ old('numero', $technicien->numero) }}">
    <input type="text" name="specialite" value="{{ old('specialite', $technicien->specialite) }}">
    <button type="submit">Mettre à jour</button>
</form>

</body>
</html>