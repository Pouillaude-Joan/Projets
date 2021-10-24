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
                                <h1>Ajout Animal</h1>
                            </div>
                        </div>
                        <form action="../controllers/FaireAjouterAnimalController.php" method="POST" name="registrationAnimal">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom</label>
                                <input type="text" name="nom" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Entrer nom">
                            </div>
                            <div class="form-group">
                            <label>Type</label> : Chat <input type="radio" name="type" value="chat" required /> 
                                                 Chien <input type="radio" name="type" value="chien" required /><br />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Race</label>
                                <input type="text" name="race" class="form-control" id="race" aria-describedby="emailHelp" placeholder="Entrer race">
                            </div>
                            <div class="form-group">
                            <label>Sexe</label> : Mâle <input type="radio" name="sexe" value="m" required /> 
                                                Femelle <input type="radio" name="sexe" value="f" required /><br />
                            </div>                    
                            <div class="form-group">
                                <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
                                <label for="exampleInputEmail1">Photo</label>
                                <input type="file" name="photo" class="form-control" id="photo" /><br/>
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