<?php
// Remise à 0 des variables
$email = $password = "";
// Si la méthode de requète du serveur est en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Déclaration de la fonction test input
    function test_input($data)
    {
        // Supprime les espaces
        $data = trim($data);
        // Supprime les /
        $data = stripslashes($data);
        // Convertit les caractères spéciaux en entités HTML
        $data = htmlspecialchars($data);
        return $data;
    }
    // Encryptage du mot de passe
    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    // Si le champ mot de passe est vide afficher le message d'erreur
    if (empty($_POST["password"])) {
        $password_error = "Le password est requis";
        // Sinon Appliquer la fonction test input au mot de passe
    } else {
        $password = test_input($_POST["password"]);
        // vérifier si le mot de passe ne contient que des lettres ou des chiffres 
        if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
            // Si ce n'est pas le cas afficher le message d'erreur et remise de la variable à 0
            $password_error = "Seuls les lettres et les chiffres sont autorisés";
            $_POST["password"] = "";
        }
    }
    // Si le champ email est vide afficher le message d'erreur
    if (empty($_POST["email"])) {
        $email_error = "Email est requis";
        // Sinon Appliquer la fonction test input a l'email
    } else {
        $email = test_input($_POST["email"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Si ce n'est pas le cas afficher le message d'erreur et remise de la variable à 0
            $email_error = "Format d'email invalide";
            $_POST["email"] = "";
        }
    }
    // Si email et password sont vide 
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        // Définir la variable succes sur 1
        $success = '1';
        $file = 'users.csv';
        // Ouvrir le fichier csv en lecture
        if (($h = fopen("{$file}", "r")) !== FALSE) {
            // Tant que le fichier contient des lignes 
        
            while (($line = fgetcsv($h, 1000, ",")) !== FALSE) {
                // Vérification de la validité du mot de passe
                $auth = password_verify($_POST['password'], $line[1]);
                // Pour chaque cellules présente dans une ligne 
                foreach ($line as $cell) {
                    // Si la cellule correspond à l'email et au mot de passe
                    if (($cell == $_POST['email']) && ($hash == $auth)) {
                        // Définir la variable succes sur 2
                        $success = '2';
                        // Si la cellule correspond à l'email mais pas au mot de passe
                    } elseif (($cell == $_POST['email']) && ($hash != $auth)) {
                        // Définir la variable succes sur la valeur 0
                        $currentEmail = $cell;
                        $success = '0';
                    }
                }
            }
        }
        // Si la variable succes = 0
        switch ($success) {
            case '0':
                // Affichage du message d'erreur
                $email_error = "L'email <b>$currentEmail</b> est déjà utilisé";
                $password_error = "Mot de passe invalide";
                break;
                
            case '1':
                // Si la variable succes = 1
                // Stock l'email et le mot de passe dans un tableau
                $dataPost = array(
                    $_POST['email'],
                    $hash
                );
                // Ouvre le fichier csv en lecture
                $fp = fopen('users.csv', 'a');
                // Ecriture dans le fichier csv
                fputcsv($fp, $dataPost);
                // Crée un user authentifié
                session_start();
                $_SESSION['auth'] = $email;
                // Fermer le fichier 
                fclose($fp);
                // Redirection vers la page privée
                header('Location: private.php');
                break;
            case '2':
                // Si la variable succes = 2
                // Crée un user authentifié
                session_start();
                $_SESSION['auth'] = $email;
                // Redirection vers la page privée
                header('Location: private.php');
                break;
        }
    }
}
// Affiche le header
include('header.php');
?>



<div class="container">
    <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">

            <p class="badge-danger rounded-pill text-center">Nous vous remercions de votre fidélité</p>

            <form action="login.php" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                    <medium id="emailHelp" class="form-text text-muted"></small>

                        <?php
// Affichage du message d'erreur email
                        echo "<div class=\"message-erreur\" > $email_error </div> ";

                        ?>

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">

                    <?php
// Affichage du message d'erreur mot de passe
                    echo "<div class=\"message-erreur\" > $password_error </div> ";

                    ?>

                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-danger">OK</button>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div>
</div>
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





<?php
// Affiche le footer
include('footer.php');
?>