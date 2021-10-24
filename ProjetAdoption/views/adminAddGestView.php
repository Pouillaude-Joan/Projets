<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DoggoCat - Site n°1 de l'adoption des pitis chatchats et des pitis chienchiens</title>

    <!--Bootstrap core CSS-->
    <link href="../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/connexion.css" rel="stylesheet">
    <!-- Custom styles for this template
    <link href="../css/shop-homepage.css" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="./indexController.php">DoggoCat</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./indexController.php">Accueil
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['connectedUser']) && $_SESSION['connectedUser'] != null && $profile[0] == 1) {
                        echo ('
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
          </button>
            <div class="collapse navbar-collapse" id="navbar-list-4">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="./profileController.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="30" height="30" class="rounded-circle">
                  </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="./indexController.php">Suivie des adoptions</a>
                      <a class="dropdown-item" href="./profileController.php">Profil</a>
                      <a class="dropdown-item" href="./deconnexionController.php">Se déconnecter</a>
                    </div>
                </li>   
              </ul>
            </div>
            ');
                    } else if (isset($_SESSION['connectedUser']) && $_SESSION['connectedUser'] != null && $profile[1] == 1) {
                        echo ('
            <li class="nav-item">
            <a class="nav-link" href="./adminUserMenuController.php">Administration utilisateurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./adminGestMenuController.php">Administration gestionnaires 
            </a>
          </li>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
              </span>
            </button>
              <div class="collapse navbar-collapse" id="navbar-list-4">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./profileController.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="30" height="30" class="rounded-circle">
                    </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./indexController.php">Suivie des adoptions</a>
                        <a class="dropdown-item" href="./profileController.php">Profil</a>
                        <a class="dropdown-item" href="./deconnexionController.php">Se déconnecter</a>
                      </div>
                  </li>   
                </ul>
              </div>
              ');
                    } else if (isset($_SESSION['connectedUser']) && $_SESSION['connectedUser'] != null && $profile[2] == 1) {
                        echo ('
          <li class="nav-item">
            <a class="nav-link" href="./adminMenuController.php">Gestion Animaux
            </a>
          </li>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
              </span>
            </button>
              <div class="collapse navbar-collapse" id="navbar-list-4">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="./profileController.php" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="30" height="30" class="rounded-circle">
                    </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./indexController.php">Suivie des adoptions</a>
                        <a class="dropdown-item" href="./profileController.php">Profil</a>
                        <a class="dropdown-item" href="./deconnexionController.php">Se déconnecter</a>
                      </div>
                  </li>   
                </ul>
              </div>
              ');
                    } else {
                        echo ('<li class="nav-item">  <a class="nav-link" href="./connexionRegistrationController.php"> Se connecter </a> </li>');
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!--body-->
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Ajout Gestionnaire</h1>
                            </div>
                        </div>
                        <form action="./gestRegistrationController.php" method="POST" name="registration">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mail</label>
                                <input type="email" name="mail" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Entrer mail">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mot de passe</label>
                                <input type="password" name="mdp" class="form-control" id="mdp" aria-describedby="emailHelp" placeholder="Entrer mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" name="nom" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Entrer nom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prénom</label>
                                <input type="text" name="prenom" class="form-control" id="prenom" aria-describedby="emailHelp" placeholder="Entrer prénom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numéro de téléphone</label>
                                <input type="tel" name="tel" class="form-control" id="tel" aria-describedby="emailHelp" placeholder="Entrer numéro de téléphone">
                            </div>

                            <!-- ADRESSE -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Rue</label>
                                <input type="text" name="rue" class="form-control" id="rue" aria-describedby="emailHelp" placeholder="Entrer votre rue">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numéro de rue</label>
                                <input type="number" name="num" class="form-control" id="num" aria-describedby="emailHelp" placeholder="Entrer numéro de rue">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code Postal</label>
                                <input type="number" name="cp" class="form-control" id="cp" aria-describedby="emailHelp" placeholder="Entrer code postal">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ville</label>
                                <input type="text" name="ville" class="form-control" id="ville" aria-describedby="emailHelp" placeholder="Entrer ville">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pays</label>
                                <input type="text" name="pays" class="form-control" id="pays" aria-describedby="emailHelp" placeholder="Entrer pays">
                            </div>

                            <div class="col-md-12 text-center mb-3">
                                <button type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Ajouter</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendors/jquery/jquery.min.js"></script>
    <script src="../js/connexion.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>