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
    <link href="../css/profile.css" rel="stylesheet">
    <!-- Custom styles for this template
    <link href="../css/shop-homepage.css" rel="stylesheet">-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                            <span class="sr-only">(current)</span>
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
    <div class="container emp-profile">
        <form method="post" action="./doModifyProfileController.php">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Changer la photo
                            <input type="file" name="file" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            Votre profil.
                        </h5>
                        <h6>

                            <?php echo ($_SESSION['connectedUser']->getNom() . ' '  . $_SESSION['connectedUser']->getPrenom()); ?>

                        </h6>
                        <p class="proile-rating">Ancienneté : <span>à faire</span></p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Informations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Adresse</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Modifier" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p></p>
                        <a href=""></a><br />
                        <a href=""></a><br />
                        <a href=""></a>
                        <p></p>
                        <a href=""></a><br />
                        <a href=""></a><br />
                        <a href=""></a><br />
                        <a href=""></a><br />
                        <a href=""></a><br />
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nom" value="<?php echo ($_SESSION['connectedUser']->getNom()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prenom</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="prenom" value="<?php echo ($_SESSION['connectedUser']->getPrenom()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="mail" value="<?php echo ($_SESSION['connectedUser']->getMail()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Téléphone</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="tel" value="<?php echo ($_SESSION['connectedUser']->getTel()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Mot de passe</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="mdp" value="<?php echo ($_SESSION['connectedUser']->getMotDePasse()); ?>" require />
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Rue</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="rue" value="<?php echo ($_SESSION['connectedUser']->getAdresse()->getRue()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Numéro de rue</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="num" value="<?php echo ($_SESSION['connectedUser']->getAdresse()->getNum()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Code postal</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="cp" value="<?php echo ($_SESSION['connectedUser']->getAdresse()->getCodePostal()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Ville</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="ville" value="<?php echo ($_SESSION['connectedUser']->getAdresse()->getVille()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Pays</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="pays" value="<?php echo ($_SESSION['connectedUser']->getAdresse()->getPays()); ?>" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Votre bio</label><br />
                                    <p>Parlez de vous ! :)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendors/jquery/jquery.min.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>