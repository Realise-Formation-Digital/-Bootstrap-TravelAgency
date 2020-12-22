<?php
// Affiche le header
include('header.php');

?>
<section class="hero">
    <div class="container">
        <div class="text-center">
            <h2><br>Page privée</h2>
            <?php
            // Si utilisateur est pas authentifié
            if (!isset($_SESSION['auth'])) {
                // Afficher  message accès refusé
                echo "<div class=\"message-notok\" >Accès refusé</div><br /><br />";
            } else {
                // Sinon afficher message de bienvenue et retourne le contenu du fichier database contact.csv sous forme de tableau
                echo "<div class=\"message-ok\" >Bienvenue <b>" . $_SESSION['auth'] . "</b></div><br />
                <div class=\"row justify-content-center text-center\"><table class=\"table table-light rounded\">
                <thead>
                <tr>
                  <th scope=\"col\" class=\"badge-danger \">Nom</th>
                  <th scope=\"col\" class=\"badge-danger\">Email</th>
                  <th scope=\"col\" class=\"badge-danger\">Tel</th>
                  <th scope=\"col\" class=\"badge-danger\">Commentaire</th>
                </tr>
              </thead>
              <tbody>";

                $f = fopen("databaseContact.csv", "r");
                while (($line = fgetcsv($f)) !== false) {
                    echo "<tr>";
                    foreach ($line as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>\n";
                }
                fclose($f);

                echo "</tbody></table></div><br />";
            } ?>
        </div>
    </div>
</section>

<div class="container">
</div>

<?php
// Affiche le footer
include('footer.php');
?>