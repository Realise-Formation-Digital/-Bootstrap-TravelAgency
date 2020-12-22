<?php
// Si pas de session ouverte
if (session_status() == PHP_SESSION_NONE) {
// Ouvrir session
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Local Taste - Travel Agency</title>

    <!--CSS Integrer-->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: rgb(194, 222, 255)
        }

        .h1:hover {
            text-decoration-style: none;
        }

        h1 {
            font-size: 3.5em;
        }

        h2 {
            margin-top: 1em;
            margin-bottom: 1em;
            color: #183050;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-family: Lato, sans-serif;
        }

        h3 {
            color: white;
            /* text-shadow: 1px 1px 4px rgb(0, 0, 0); */
            background-color: #E53C3A;
            font-size: 1.5em;
        }

        h3+p {
            color: white;
        }

        h5 {
            font-weight: bold;
            font-family: Lato, sans-serif;
        }

        .price-tag {
            color: #E53C3A;
            font-weight: 600;
        }

        .img-unique {
            height: 250px;
            object-fit: cover;
            margin-top: 1em;
        }

        .logo-fleur {
            height: 15vh;
            display: inline-block;
        }

        .img-section:hover {
            opacity: 80%;
            transition: width 2s;
        }

        header {
            background-color: #fff;
        }

        .nav-link {
            font-size: 1.2em;
        }

        .hero-background {
            background-image: url(assets/img/hero-riviera.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
            height: 330px;
        }

        .fromulaire-reservation {
            margin-top: 2%;
            margin-left: 5%;
            margin-right: 5%;

            padding: 23px;
            background-color: white;
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <header>
        <!-- Bannière réduction -->
        <div class="banner alert-info text-white p-1" style="text-align: center; background-color: #344764;"><i class="icon-gift icon-white"></i>Utilisez le code COVID et bénéficiez de -15% sur TOUS les voyages ! </div>


        <!-- Barre de navigation avec logo -->
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-xl">
                <div class="row">
                    <a href="index.php" class="navbar-brand" title="Accueil">
                        <img src="assets/img/logo-fleur.png" alt="Edelweiss" class="float-left logo-fleur">
                        <p class="align-middle">
                            <h1 class="h1-home"><span style="color:rgb(194, 31, 31);">local</span> <span style="color:rgb(223, 84, 84)">taste</span></h1>
                        </p>
                    </a>
                </div>

                <button class="navbar-toggler" data-toggle="collapse" data-target=#navbarCollapse><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a href="index.php" class="nav-link">Accueil</a>
                        </li>
                        <li>
                            <a href="nos_preferences.php" class="nav-link">Nos coups de coeur</a>
                        </li>
                        <li>
                            <a href="notre-entreprise.php" class="nav-link">Notre entreprise</a>
                        </li>
                        <li>
                            <a href="contact.php" class="nav-link">Contact</a>
                        </li>
                        <?php
                        // Si un utilisateur est authentifié
                          if (isset($_SESSION['auth'])) {
                        // Afficher le bouton privé dans le menu
                            echo "<li><a class=\"nav-link\" href=\"private.php\">Privé</a></li>";
                        } ?>
                        <li>
                            
                            <?php
                            // Si un utilisateur est authentifié
                             if (isset($_SESSION['auth'])) {
                            // Afficher le bouton log out dans le menu   
                                echo "<a class=\"btn btn-danger\" type=\"button\" href=\"logout.php\">Log Out</a>";
                                // Sinon afficher le bouton log in
                            } else {
                                echo "<a class=\"btn btn-danger\" type=\"button\" href=\"login.php\">Log In</a>";
                            } ?>

                        </li>





                    </ul>
                </div>
            </nav>
        </div>
        <hr>
    </header>