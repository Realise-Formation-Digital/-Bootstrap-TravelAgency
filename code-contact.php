<?php

$nom = $email = $telephone = $commentaire = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    }
      if (empty($_POST["nom"])) {
        $name_error = "Le nom est requis";
      } else {
        $name = test_input($_POST["nom"]);
        // vérifier si le nom ne contient que des lettres et des espaces
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $name_error = "Seuls les lettres et les espaces blancs sont autorisés";
          echo $name_error; 
        }
      }

      if (empty($_POST["email"])) {
        $email_error = "Email est requis";
      } else {
        $email = test_input($_POST["email"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email_error = "Format d'email invalide";
          echo $email_error; 
        }
      }

      if (empty($_POST["telephone"])) {
        $phone_error = "Le téléphone est requis";
      } else {
        $phone = test_input($_POST["telephone"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)){
          $phone_error = "Numéro de téléphone invalide"; 
          echo $phone_error;
        }
      }

$data = array(
    $_POST['nom'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['commentaire']
);

// Open file in append mode 
$fp = fopen('databaseContact.csv', 'a');

// Append input data to the file   
fputcsv($fp, $data);

// close the file 
fclose($fp);
?>
