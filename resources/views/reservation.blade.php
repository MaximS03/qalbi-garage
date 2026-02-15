<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre rendez-vous</title>
    <link rel="stylesheet" href="{{ asset('css/reservation.css') }}">
</head>
<body>
    <div class="container">
        <h2>Prise de rendez-vous</h2>
        <form action="#" method="POST">
            @csrf
            <div class="form-row">
                <input type="text" name="nom" id="nom" placeholder="Nom" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-row">
                <input type="text" name="vehicule" id="vehicule" placeholder="Véhicule" required>
                <input type="date" name="date" id="date" placeholder="Date" required>
            </div>
            <div class="form-row">
                <input type="time" name="heure" id="heure" placeholder="Heure" required>
                <textarea name="probleme" id="probleme" placeholder="Décrivez votre problème" rows="3"></textarea>
            </div>
            <button type="submit">Valider le rendez-vous</button>
        </form>
    </div>
</body>
</html>
