<?php

$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["email"])) {
        $email_error = "Email est requis";
    } else {
        $email = test_input($_POST["email"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Format d'email invalide";
        }
    }

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);



    if (empty($_POST["password"])) {
        $password_error = "Le password est requis";
    } else {
        $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $password = test_input($_POST['password']);
 

        // vérifier si mot de pass est bien formée
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $password_error = 'Le mot de passe doit comporter au moins 8 caractères et doit inclure au moins une lettre majuscule, un chiffre et un caractère spécial.';
        }
    }


    $data = array(
        $_POST['email'],
        $hash
    );

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $validation = "Bienvenue $email!";
        // Open file in append mode
        $fp = fopen('users.csv', 'a');

        // Append input data to the file
        fputcsv($fp, $data);

        // close the file 
        fclose($fp);
    }
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
    <title>Document</title>
   
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
            
            h3 + p {
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
            
            .img-section:hover{
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
                height:330px;
            }
            
            .fromulaire-reservation {
                margin-top:2%;
                margin-left:5%;
                margin-right:5%;
            
                padding:23px;
                background-color:white;
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
        <nav class="navbar navbar-light navbar-expand-lg">
            <div class="row">
                <a href="index.html" class="navbar-brand">
                    <img src="assets/img/logo-fleur.png" alt="Edelweiss" class="float-left logo-fleur mr-2">
                    <p class="align-middle"><h1 class="h1-home"><span style="color:rgb(194, 31, 31);">local</span> <span style="color:rgb(223, 84, 84)">taste</span></h1></p>
                </a>
            </div>
            
            <button class="navbar-toggler" data-toggle="collapse" data-target=#navbarCollapse><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a href="index.html" class="nav-link">Accueil</a>
                    </li>
                    <li>
                        <a href="nos_preferences.html" class="nav-link">Nos coups de coeur</a>
                    </li>
                    <li>
                        <a href="notre-entreprise.html" class="nav-link">Notre entreprise</a>
                    </li>
                    <li>
                        <a href="contact.php" class="nav-link">Contact</a>
                        </li>
                        <li> 
                            <a href="#" class="btn btn-primary" role="button">&#9757lOGIN</a>

                        </li>
                </ul>
            </div>
        </nav>   
</div>
<hr>
</header>

 <div class="container">
    <div class="row">
        <div class="col-sm-6">

           <?php

            echo "<div class=\"message-ok\" > $validation </div> ";

            ?>

        <form action="login.php" method="post"> 

            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <medium id="emailHelp" class="form-text text-muted"></small>

                 <?php

                        echo "<div class=\"message-erreur\" > $email_error </div> ";

                        ?>

          </div> 

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

                 <?php

                        echo "<div class=\"message-erreur\" > $password_error </div> ";

                        ?>

          </div>

         <div class="form-group">
                <button type="submit" class="btn btn-primary">lOGIN</button>
         </div>
         </form>
         <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    
                    <ul><strong>Nous vous remercions de votre fidélité</strong></ul>

                </div>
                <div class="col-sm-6">
       
    </div>
</div>
<p>
</p>
<p>
</p>
<p>
</p>
<p>
</p>





    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Adresse</h3>
                    <ul><li>8, rue Viguet - 1227 Les Acacias </li></ul>
                    <h3>Téléphone</h3>
                    <ul><li>+ 41 (0)22 308 60 10</li></ul>
                    <h3>Horaires</h3>
                    <ul><li>Du lundi au vendredi, de 9h à 17H</li></ul>
                </div>
                <div class="col-sm-6">
                    <h3>Contact</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.8802012085266!2d6.12650291555611!3d46.19294257911629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7b2e1299827b%3A0xb6bbc30dd8e5306f!2sr%C3%A9alise%20-%20magasin%20d&#39;informatique%20d&#39;occasion!5e0!3m2!1sfr!2sch!4v1605783655516!5m2!1sfr!2sch" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>   
        </div><!--/container-->

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <hr>
                <p>&#169 par Super Mario Agency 2020</p>
                </div>
            </div>
        </div>
       



    </footer>




</body>
<!--Script-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>