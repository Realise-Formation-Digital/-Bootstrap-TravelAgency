<?php
include('header.php');
?>
<section class="hero">
    <div class="container-fluid hero-background">
        <div class="text-center">
            <h2><br>Formulaire de réservation</h2>
        </div>
        <!--/row-->
        <div class="row  fromulaire-reservation">
            <form action="/action_page.php">

                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="destination-dropdown">Destination :</label>
                        <button class="btn dropdown">
                            <a class="nav-link dropdown-toggle btn-danger" href="#" id="destination-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ville
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Genève</a>
                                <a class="dropdown-item" href="#">Lausannegeles</a>
                                <a class="dropdown-item" href="#">Zurich</a>
                                <a class="dropdown-item" href="#">Berne</a>
                                <a class="dropdown-item" href="#">Bâle</a>
                                <a class="dropdown-item" href="#">Lugano</a>
                                <a class="dropdown-item" href="#">Locarno</a>
                                <a class="dropdown-item" href="#">Bellizone</a>
                            </div>
                        </button>
                    </div>

                    <div class="col-sm-4">
                        <label for="date">Date de départ :</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>

                    <div class="col-sm-4">
                        <label for="jour-dropdown">Durée du séjour :</label>
                        <button class="btn dropdown ">
                            <a class="nav-link dropdown-toggle btn-danger" href="#" id="jour-dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                Nombre de jour
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">2-3 jour</a>
                                <a class="dropdown-item" href="#">4-8 jour</a>
                                <a class="dropdown-item" href="#">6-12 jour</a>
                                <a class="dropdown-item" href="#">12-24 jour</a>
                            </div>
                        </button>
                    </div>

                    <div class="col-sm-2">
                        <label for="nb-personne">Participants :</label>
                        <input type="nb-participant" class="form-control" id="nb-personne" placeholder="Nombre de participants">
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
        <!--/row-->
    </div>
    <!--/container-->
</section>

<!-- Section images thématiques -->
<div class="container">
    <div class="text-center">
        <h2>Notre sélection thématique</h2>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
            <a href="#"><img src="assets/img/section-villes.jpg" alt="" class="img-fluid img-section">
                <h3 class="carousel-caption">Plus belles villes</h3>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 ol-lg-6 col-xl-6 mb-4">
            <a href="#"><img src="assets/img/section-gastronomique.jpg" alt="" class="img-fluid img-section">
                <h3 class="carousel-caption">Gastronomique</h3>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
            <a href="#"><img src="assets/img/section-musees.jpg" alt="" class="img-fluid img-section">
                <h3 class="carousel-caption">Découvertes</h3>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
            <a href="#"><img src="assets/img/section-relaxation.jpg" alt="" class="img-fluid img-section">
                <h3 class="carousel-caption">Relaxation</h3>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
            <a href="#"><img src="assets/img/section-amoureux.jpeg" alt="" class="img-fluid img-section">
                <h3 class="carousel-caption">En amoureux</h3>
            </a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4">
            <a href="#"><img src="assets/img/section-eau.jpg" alt="" class="img-fluid img-section">
                <h3 class="carousel-caption">Bordure d'eau</h3>
            </a>
        </div>
    </div>


    <!-- Début de la partie cartes uniques -->

    <div class="text-center">
        <h2 class="h2">Nos destinations préférées</h2>
    </div>
    <div class="row text-center">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <div class="">
                <a href="#"><img src="assets/img/unique-bale.jpg" alt="Bâle" class="card-img-top img-unique"></a>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Bâle</h5>
                    <p class="card-text">Une belle rencontre entre vieille ville et architecture moderne.</p>
                    <p>Dès <span class="price-tag">224.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-berne.jpg" alt="Berne" class="card-img-top img-unique"></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Berne</h5>
                    <p class="card-text">La capitale qui accueille le magnifique Palais National.</p>
                    <p>Dès <span class="price-tag">169.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-interlaken.jpg" alt="Interlaken" class="card-img-top img-unique"></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Interlaken</h5>
                    <p class="card-text">Eau cristalline, montagnes et cascades. Quoi demander de plus ?</p>
                    <p>Dès <span class="price-tag">213.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-lauterbrunnen.jpg" alt="Lauterbrunnen" class="card-img-top img-unique"></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Lauterbrunnen</h5>
                    <p class="card-text">Certainement le meillleur que la nature ait à nous offrir.</p>
                    <p>Dès <span class="price-tag">258.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-diablerets.jpg" alt="Les Diablerets" class="card-img-top img-unique"></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Les Diablerets</h5>
                    <p class="card-text">Domaine de ski exceptionnel au coeur des Alpes vaudoises.</p>
                    <p>Dès <span class="price-tag">220.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-grindelwald.jpg" alt="Grindelwald" class="card-img-top img-unique"></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Grindelwald</h5>
                    <p class="card-text">Lieu magique au coeur d'une inoubliable vallée.</p>
                    <p>Dès <span class="price-tag">270.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-oberland.jpeg" alt="Lauterbrunnen" class="card-img-top img-unique"></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Oberland Bernois</h5>
                    <p class="card-text">Oasis de calme et de détente en plein cœur d'un paysage unique.</p>
                    <p>Dès <span class="price-tag">170.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-st_ursanne.jpg" alt="Bâle" class="card-img-top img-unique"></a>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Saint-Ursanne</h5>
                    <p class="card-text">Petite cité médiévale au coeur de nature luxuriante.</p>
                    <p>Dès <span class="price-tag">183.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <a href="#"><img src="assets/img/unique-riviera.jpg" alt="Bâle" class="card-img-top img-unique"></a>
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title mb-0">La Riviera</h5>
                    <p class="card-text">L'incontournable bord de lac romand, Montreux, Vevey, ...</p>
                    <p>Dès <span class="price-tag">237.-</span> par personne/séjour</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>