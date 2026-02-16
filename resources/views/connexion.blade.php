<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/connexion.css') }}">
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

    <form action="{{ route('login') }}" method="POST">
        @csrf

    <h2>Connexion</h2>
        <div class="field">
            <input type="email" name="email" placeholder="Entrez votre email" required>
            <!-- <label>Email</label> -->
        </div>

        <div class="field">
            <input type="password" name="password" placeholder="Entrez le mot de passe" required>
            <!-- <label>Mot de passe</label> -->
        </div>
        <input type="checkbox" name="se_souvenir">
        <label for="se_souvenir">Se souvenir de moi</label>
        <button type="submit">Se connecter</button>

        <p>Pas encore inscrit ?
            <a href="{{ route('inscription') }}"> Inscrivez-vous</a>
        </p>
    </form>

</body>

</html>