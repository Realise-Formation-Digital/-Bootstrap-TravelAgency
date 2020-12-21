<?php
session_start();
include('header.php');

?>
<section class="hero">
    <div class="container">
        <div class="text-center">
            <h2><br>Page privée</h2>
            <?php
            if (!isset($_SESSION['auth'])) {

                echo "<p>Accès refusé</p>";
            } else {

                echo "<p>Bienvenue</p><div class=\"row justify-content-center text-center\"><table class=\"table table-light\">
                <thead>
                <tr>
                  <th scope=\"col\">Nom</th>
                  <th scope=\"col\">Email</th>
                  <th scope=\"col\">Tel</th>
                  <th scope=\"col\">Commentaire</th>
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

                echo "</tbody></table></div>";
            } ?>
        </div>
    </div>
</section>

<div class="container">
</div>

<?php
include('footer.php');
?>