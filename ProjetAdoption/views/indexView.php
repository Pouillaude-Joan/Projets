<!DOCTYPE html>
<html lang="en">
​
<head>
​
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
​
  <title>DoggoCat - Site n°1 de l'adoption des pitis chatchats et des pitis chienchiens</title>
​
  <!-- Bootstrap core CSS -->
  <link href="../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
​
  <!-- Custom styles for this template -->
  <link href="../css/profile.css" rel="stylesheet">
​
</head>
​
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
          <li class="nav-item active">
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
            <li class="nav-item">
            <a class="nav-link" href="./AfficherAjouterAnimauxController.php">Ajout Animal
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./adminMenuController.php">Gestion des adoptions
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
​
  <!-- Page Content -->
  <div class="container">
​
    <div class="row">
​
      <div class="col-lg-3">
​
        <h1 class="my-4"></h1>
        <div class="list-group">
          <a href="./afficherChatView.php" class="list-group-item">Chats</a>
          <a href="./afficherChienView.php" class="list-group-item">Chiens</a>
        </div>
​
      </div>
      <!-- /.col-lg-3 -->
​
      <div class="col-lg-9">
​
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://sflc.ca/wp-content/uploads/2019/07/Saint-Faustin-Lac-Carre-animauxGOOD.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://www.royalqueenseeds.fr/img/cms/dog-consume-cannabis.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://domaine-de-frevent.com/wp-content/uploads/2018/09/mise-en-avant-contact.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
​
        <div class='row'>
          <?php
          foreach ($animals as $animal) {
            echo "<div class='col-lg-4 col-md-6 mb-4'>";
            echo "<div class='card h-100'>";
            echo "<a href='#'><img class='card-img-top' src='" . $animal->getPhoto() . "' alt=''></a>";
            echo "<div class='card-body'>";
            echo "<h4 class='card-title'><form action='../controllers/FaireDetailAnimalController.php' method='post'><input type='hidden' name='id' value='" . $animal->getId() . "'/><button>" . $animal->getNom() . "</button></form></h4>";
            echo "<h5>" . $animal->getRace() . "</h5>";
            echo "<p class='card-text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!
                </p>";
            echo "</div>";
            echo "<div class='card-footer'>";
            echo "<small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9734;</small>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
          ?>
        </div>
        <!-- /.row -->
​
      </div>
      <!-- /.col-lg-9 -->
​
    </div>
    <!-- /.row -->
​
  </div>
  <!-- /.container -->
  <script src="../vendors/jquery/jquery.min.js"></script>
  <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
​
</html>


