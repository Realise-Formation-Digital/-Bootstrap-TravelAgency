<?php
// Remise à 0 des variables
$nom = $email = $telephone = $commentaire = "";
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
    // Si le champ nom est vide
    if (empty($_POST["nom"])) {
        // Affiche le nom est requis
        $name_error = "Le nom est requis";
    } else {
        // Sinon il applique la fonction test input à la variable nom du formulaire
        $name = test_input($_POST["nom"]);
        // vérifier si le nom ne contient que des lettres des accents et des espaces
        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/", $name)) {
            // Si ce n'est pas le cas affiche le message d'erreur
            $name_error = "Seuls les lettres et les espaces blancs sont autorisés";
            // Remise à 0 de la variable nom
            $_POST["nom"] = "";
        }
    }
    // Si le champ email est vide
    if (empty($_POST["email"])) {
        // Affiche le email est requis
        $email_error = "Email est requis";
    } else {
        // Sinon il applique la fonction test input à la variable email du formulaire
        $email = test_input($_POST["email"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Si ce n'est pas le cas affiche le message d'erreur
            $email_error = "Format d'email invalide";
            // Remise à 0 de la variable email
            $_POST["email"] = "";
        }
    }
    // Si le champ telephone est vide
    if (empty($_POST["telephone"])) {
        // Affiche le telephone est requis
        $phone_error = "Le téléphone est requis";
    } else {
        // Sinon il applique la fonction test input à la variable telephone du formulaire
        $phone = test_input($_POST["telephone"]);
        // vérifier si le telephone est bien formée
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
            // Si ce n'est pas le cas affiche le message d'erreur
            $phone_error = "Numéro de téléphone invalide";
            // Remise à 0 de la variable telephone
            $_POST["telephone"] = "";
        }
    }
    // Si le champ commentaire est vide
    if (empty($_POST["commentaire"])) {
        // Affiche le commentaire est requis
        $comment_error = "Un commentaire est requis";
    } else {
        // Sinon il applique la fonction test input à la variable commentaire du formulaire
        $comment = test_input($_POST["commentaire"]);
    }
    // Stock les variables dans un tableau 
    $data = array(
        $_POST['nom'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['commentaire']
    );
    // Si aucun des champs n'est vide 
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['commentaire'])) {
        // Affichage du message de validation
        $validation = "Votre message à bien été envoyé!";
        // Ouverture du fichier csv
        $fp = fopen('databaseContact.csv', 'a');

        // Ecriture des variables dans le fichier
        fputcsv($fp, $data);

        // Fermer le fichier 
        fclose($fp);
    }
}



// Affiche le header
include('header.php');
?>

<section id="formulaire-contact" style="border-radius: 25px;">
    <div class="container">
        <?php
        // Affichage du message validation si le message à bien été envoyé
        if ($validation != null) {

            echo "<div class=\"message-ok\" > $validation </div> <br />";
        }
        ?>
        <form action="contact.php" method="post">
            <fieldset>
                <h1 id="titre-contact" class="text-secondary">Contact</h1><br />
                <div class="form-group row">
                    <label for="inlineFormInputName" class="col-sm-2 col-form-label">Nom:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" class="form-control" id="inlineFormInputName" placeholder="Votre nom">
                        <?php
                        // Affichage du message erreur nom
                        echo "<div class=\"message-erreur\" > $name_error </div> ";

                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Votre email">

                        <?php
                        // Affichage du message erreur email
                        echo "<div class= \"message-erreur\" > $email_error </div> ";

                        ?>

                    </div>

                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Tél:</label>
                    <div class="col-sm-10">
                        <input type="text" name="telephone" class="form-control" id="phone" placeholder="ex: 0781234567">


                        <?php
                        // // Affichage du message erreur telephone
                        echo "<div class=\"message-erreur\" > $phone_error </div> ";

                        ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Commentaires:</label>
                    <textarea name="commentaire" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    <?php
                    // Affiche message d'erreur du champ commentaire
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
// Affiche le footer
include('footer.php');
?>