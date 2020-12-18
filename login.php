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

    $data = array(
        $_POST['email'],
        $hash
    );

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $validation = "Bienvenue $email";
        // Open file in append mode
        $fp = fopen('users.csv', 'a');

        // Append input data to the file
        fputcsv($fp, $data);

        // close the file 
        fclose($fp);
    }
}


include('header.php');
?>



    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <?php

                echo "<div class=\"message-ok\" > $validation </div> ";

                ?>

                <form action="login.php" method="post">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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

                        </div>
                        <div class="col-sm-6">

                            <ul><strong>Nous vous remercions de votre fidélité</strong></ul>

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