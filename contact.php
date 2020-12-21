<?php

$nom = $email = $telephone = $commentaire = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($_POST["nom"])) {
        $name_error = "Le nom est requis";
    } else {
        $name = test_input($_POST["nom"]);
        // vérifier si le nom ne contient que des lettres et des espaces
        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/", $name)) {
            $name_error = "Seuls les lettres et les espaces blancs sont autorisés";
            $_POST["nom"] = "";
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

    if (empty($_POST["telephone"])) {
        $phone_error = "Le téléphone est requis";
    } else {
        $phone = test_input($_POST["telephone"]);
        // vérifier si le telephone est bien formée
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
            $phone_error = "Numéro de téléphone invalide";
            $_POST["telephone"] = "";
        }
    }

    if (empty($_POST["commentaire"])) {
        $comment_error = "Un commentaire est requis";
    } else {
        $comment = test_input($_POST["commentaire"]);
    }

    $data = array(
        $_POST['nom'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['commentaire']
    );

    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['commentaire'])) {
        $validation = "Votre message à bien été envoyé!";
        // Open file in append mode
        $fp = fopen('databaseContact.csv', 'a');

        // Append input data to the file
        fputcsv($fp, $data);

        // close the file 
        fclose($fp);
    }
}



?>
<?php
include('header.php');
?>

<section id="formulaire-contact" style="border-radius: 25px;">
    <div class="container">
        <?php

        if ($validation != null) {

            echo "<div class=\"message-ok\" > $validation </div> <br />";
        }
        ?>
        <form action="contact.php" method="post">
            <fieldset>
                <h1 id="titre-contact">Contact</h1><br />
                <div class="form-group row">
                    <label for="inlineFormInputName" class="col-sm-2 col-form-label">Nom:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" class="form-control" id="inlineFormInputName">
                    </div>
                    <?php

                    echo "<div class=\"message-erreur\" > $name_error </div> ";

                    ?>

                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Tél:</label>
                    <div class="col-sm-10">
                        <input type="text" name="telephone" class="form-control" id="phone">
                    </div>

                    <?php

                    echo "<div class=\"message-erreur\" > $phone_error </div> ";

                    ?>


                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="inputEmail">
                    </div>

                    <?php

                    echo "<div class= \"message-erreur\" > $email_error </div> ";

                    ?>


                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Commentaires:</label>
                    <textarea name="commentaire" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <?php

                    echo "<div class=\"message-erreur\" > $comment_error </div> ";

                    ?>
                </div>
                <button type="submit" class="btn btn-danger bouton-envoyer">Envoyer</button>
            </fieldset>
        </form><br />
    </div>
    <div class="container">
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.8773310194797!2d6.126604616619462!3d46.19299969253617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7b2e1299827b%3A0x6058f3a4660b6a0b!2sRue%20Viguet%208%2C%201227%20Gen%C3%A8ve!5e0!3m2!1sfr!2sch!4v1605703114904!5m2!1sfr!2sch" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php
include('footer.php');
?>