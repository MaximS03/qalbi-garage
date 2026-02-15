<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{ asset('css/inscription.css') }}">
</head>
<body>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
<form action="{{ route('register') }}" method="POST">
    @csrf

<h2>Inscription</h2>

<!-- <label for="nom">Nom:</label> -->
<input type="text" name="name" placeholder="Entrez votre nom" required>

<!-- <label for="email">Email:</label> -->
<input type="email" name="email" placeholder="Entrez votre email" required>

<!-- <label for="password">Mot de passe:</label> -->
<input type="password" name="password" placeholder="Entrez votre mot de passe" required>

<!-- <label for="password_confirmation">Confirmer le mot de passe:</label> -->
<input type="password" name="password_confirmation" placeholder="Confirmez votre mot de passe" required>



<button type="submit">S'inscrire</button>

<p>Déjà inscrit ? <a href="{{ route('connexion') }}">Connectez-vous</a></p>
</form>


</body>
</html>