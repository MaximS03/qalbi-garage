<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QALBI AutoCare</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>

<header>
    <nav class="nav">
        <h1><span>QALBI</span> AutCare</h1>
        <ul>
            <li><a href="#services" class="nav-link">Services</a></li>
            <li><a href="#conseils" class="nav-link">Conseils Auto</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}" class="nav-link">Tableau de bord</a></li>
                <li><a href="{{ route('reservation') }}" class="nav-link">Prendre RDV</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="border:none;background:none;cursor:pointer;">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('connexion') }}">Se connecter</a></li>
                <li><a href="{{ route('inscription') }}">S'inscrire</a></li>
            @endauth
            <li><a href="#aide" class="nav-link">Aide</a></li>
        </ul>
    </nav>
</header>

<main>

    
    <section class="hero">

        <div class="div0">
            <h2>Bienvenue chez <span id="qalbi-typing"><span class="qalbi-orange"></span><span class="autocare-white"></span></span></h2>
            <p>La mécanique, avec attention et expertise</p>
            @auth
                <a href="{{ route('dashboard') }}" class="btn1">Aller au tableau de bord</a>
            @endauth
            @guest
                <a href="{{ route('connexion') }}" class="btn1">Commencer maintenant</a>
            @endguest
        </div>
    </section>

    
    <section class="service" id="services">
        <h2>Nos services</h2>
        <div class="div1">
            <div class="card service-card">
                <div class="service-img-bg" style="background-image:url('/image/diagnostic.png');"></div>
                <div class="service-title">DIAGNOSTIC AUTOMOBILE</div>
            </div>
            <div class="card service-card">
                <div class="service-img-bg" style="background-image:url('/image/moteur.webp');"></div>
                <div class="service-title">RÉPARATION MOTEUR</div>
            </div>
            <div class="card service-card">
                <div class="service-img-bg" style="background-image:url('/image/vidange-moteur.jpg');"></div>
                <div class="service-title">ENTRETIEN ET VIDANGE</div>
            </div>
            <div class="card service-card">
                <div class="service-img-bg" style="background-image:url('/image/carosserie.png');"></div>
                <div class="service-title">CARROSSERIE ET PEINTURE</div>
            </div>
        </div>
    </section>

    


    <section class="conseil" id="conseils">
        <h2>Conseils Auto</h2>
        <div class="div1">
            <div class="card">
               
                <h3>Quand faire une vidange ?</h3>
                <p>La vidange doit généralement être effectuée tous les 5 000 à 10 000 km, selon le type d’huile et les recommandations du constructeur. Une huile propre protège le moteur contre l'usure et évite la surchauffe. Si le moteur devient bruyant ou si le voyant d'huile s'allume, il est temps de vérifier.</p>
            </div>
            <div class="card">
                
                <h3>Comment entretenir son moteur ?</h3>
                <p>Un moteur bien entretenu dure plus longtemps et consomme moins de carburant. Vérifiez régulièrement le niveau d'huile, le liquide de refroidissement et remplacez les filtres (air, huile) selon les intervalles recommandés. Évitez les accélérations brusques lorsque le moteur est froid.</p>
            </div>
            <div class="card">
               
                <h3>Vérifier la pression des pneus</h3>
                <p>La pression des pneus doit être contrôlée au moins une fois par mois et avant un long trajet. Des pneus mal gonflés augmentent la consommation de carburant et réduisent la sécurité. Consultez les recommandations du constructeur pour connaître la pression idéale.</p>
            </div>
            <div class="card">
                
                <h3>Entretenir la climatisation de votre voiture</h3>
                <p>Pour garder une climatisation efficace, faites-la vérifier une fois par an. Remplacez le filtre d'habitacle régulièrement et utilisez la climatisation même en hiver pour éviter l'accumulation d'humidité et de mauvaises odeurs.</p>
            </div>
        </div>
    </section>

</main>

<footer>
    <div class="footer-nav nav">
        <a href="#services" class="nav-link">Services</a>
        <a href="#conseils" class="nav-link">Conseils Auto</a>
        <a href="#aide" class="nav-link">Aide</a>
    </div>
    <div class="footer-social">
        <a href="https://www.facebook.com/" target="_blank" aria-label="Facebook"><img src="/image/facebook.avif" alt="Facebook" style="height:28px;"></a>
        <a href="https://www.whatsapp.com/" target="_blank" aria-label="WhatsApp"><img src="/image/logo_wha.webp" alt="WhatsApp" style="height:28px;"></a>
    </div>
    <p style="margin-top:10px;">&copy; 2024 QALBI AutoCare. Tous droits réservés.</p>
    <p>Contact : info@qalbi-autocare.com</p>
</footer>

<script src="{{ asset('js/welcome.js') }}"></script>

</body>
</html>
