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
    // Validate password strength
    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    if (empty($_POST["password"])) {
        $password_error = "Le password est requis";
    } else {
        $password = test_input($_POST["password"]);
        // vérifier si le nom ne contient que des lettres et des espaces
        if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
            $password_error = "Seuls les lettres et les chiffres sont autorisés";
            $_POST["password"] = "";
        }
    }
    if (empty($_POST["email"])) {
        $email_error = "Email est requis";
    } else {
        $email = test_input($_POST["email"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Format d'email invalide";
            $_POST["email"] = "";
        }
    }
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $success = '0';
        $file = 'users.csv';
        // Open the file for reading
        if (($h = fopen("{$file}", "r")) !== FALSE) {
            // Each line in the file is converted into an individual array that we call $data
            // The items of the array are comma separated
            while (($line = fgetcsv($h, 1000, ",")) !== FALSE) {
                $auth = password_verify($_POST['password'], $line[1]);
                foreach ($line as $cell) {
                    if (($cell == $_POST['email']) && ($hash == $auth)) {
                        $success = '2';
                    } elseif (($cell == $_POST['email']) && ($hash != $auth)) {
                        $email_error = "$cell est déjà utilisé";
                        $success = '1';
                    }
                }
            }
        }
        if ($success == '2') {
            session_start();
            $_SESSION['auth'] = $email;
            header('Location: private.php');
        } else if ($success == '0') {
            $dataPost = array(
                $_POST['email'],
                $hash
            );
            // Open file in append mode
            $fp = fopen('users.csv', 'a');
            // Append input data to the file
            fputcsv($fp, $dataPost);
            // Crée un user authentifié
            session_start();
            $_SESSION['auth'] = $email;
            // close the file 
            fclose($fp);
            header('Location: private.php');
        }
    }
}
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

                        echo "<div class=\"message-erreur\" > $email_error </div> ";

                        ?>

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">

                    <?php

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
include('footer.php');
?>