<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DoggoCat - Site n°1 de l'adoption des pitis chatchats et des pitis chienchiens</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/adminMenu.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
          <li class="nav-item active">
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

  <div class="container-xl">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-5">
              <h2><b>Gestion</b> des utilisateurs</h2>
            </div>
            <div class="col-sm-7">
              <a href="./adminAddGestController.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Ajouter Gestionnaire</span></a>
              <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Exporter sur Excel</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Mail</th>
              <th>Tel</th>
              <th></th>
            </tr>
          </thead>
          <?php
          foreach ($allGest as $gest) {
            echo ('<tbody>
            <tr>
              <td>'.$gest->getId().'</td>
              <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar">'.$gest->getNom().'</a></td>
              <td>'.$gest->getPrenom().'</td>
              <td>'.$gest->getMail().'</td>
              <td>'.$gest->getTel().'</td>
              <td><span class="status text-success">&bull;</span> Active</td>
              <td>
                <a href="./adminModifyGestController.php?id='.$gest->getId().'" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                <a href="./adminDeleteGestController.php?id='.$gest->getId().'" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
              </td>
            </tr>
          ');
            $i += 1;
          }
          ?>
          </tbody>
        </table>
        <div class="clearfix">
          <div class="hint-text">Montre <b><?php echo ($i); ?></b> sur <b><?php echo ($gestCnt); ?></b> entrées</div>
          <ul class="pagination">
            <li class="page-item disabled"><a href="#">Previous</a></li>
            <li class="page-item active"><a href="#" class="page-link">1</a></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">4</a></li>
            <li class="page-item"><a href="#" class="page-link">5</a></li>
            <li class="page-item"><a href="#" class="page-link">Next</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <script src="../vendors/jquery/jquery.min.js"></script>
  <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>