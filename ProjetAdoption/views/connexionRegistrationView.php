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
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET['failed']) == true) {
        echo (' <h5 class="col-md-12 text-center"> Connection failed : Wrong login or Password. <h5>');
    }
    ?>
    <!--body-->
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Connexion</h1>
                            </div>
                        </div>
                        <form action="./connexionController.php" method="POST" name="login">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="login" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mot de passe</label>
                                <input type="password" name="mdp" id="password" class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                            </div>
                            <div class="col-md-12 text-center ">
                                <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Connexion</button>
                            </div>
                            <div class="col-md-12 ">
                                <div class="login-or">
                                    <hr class="hr-or">
                                    <span class="span-or">or</span>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <p class="text-center">
                                    <a href="javascript:void();" class="google btn mybtn"><i class="fa fa-google-plus">
                                        </i> S'inscrire avec Google
                                    </a>
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="text-center">Pas encore de compte ? <a href="#" id="signup">S'inscrire ici</a></p>
                            </div>
                        </form>

                    </div>
                </div>
                <div id="second">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Inscription</h1>
                            </div>
                        </div>
                        <form action="./registrationController.php" method="POST" name="registration">

                            <div class="form-group">
                                <label>Mail</label>
                                <input type="email" name="mail" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Entrer mail" required>
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="password" name="mdp" class="form-control" id="mdp" aria-describedby="emailHelp" placeholder="Entrer mot de passe" required>
                            </div>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="nom" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Entrer nom" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prénom</label>
                                <input type="text" name="prenom" class="form-control" id="prenom" aria-describedby="emailHelp" placeholder="Entrer prénom" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numéro de téléphone</label>
                                <input type="tel" name="tel" class="form-control" id="tel" aria-describedby="emailHelp" placeholder="Entrer numéro de téléphone"
                                pattern="[0]{1}[0-9]{1}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required>
                            </div>

                            <!-- ADRESSE -->

                            <div class="form-group">
                                <label for="exampleInputEmail1">Rue</label>
                                <input type="text" name="rue" class="form-control" id="rue" aria-describedby="emailHelp" placeholder="Entrer votre rue" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Numéro de rue</label>
                                <input type="number" name="num" class="form-control" id="num" aria-describedby="emailHelp" placeholder="Entrer numéro de rue" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Code Postal</label>
                                <input type="number" name="cp" class="form-control" id="cp" aria-describedby="emailHelp" placeholder="Entrer code postal"
                                pattern="[0-9]{6}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ville</label>
                                <input type="text" name="ville" class="form-control" id="ville" aria-describedby="emailHelp" placeholder="Entrer ville" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pays</label>
                                <input type="text" name="pays" class="form-control" id="pays" aria-describedby="emailHelp" placeholder="Entrer pays" required>
                            </div>

                            <!-- FIN ADRESSE -->
                            <div class="form-group">
                                <p class="text-center">En vous inscrivant vous acceptez les <a href="#">Termes d'utilisation</a></p>
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <button type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Commencez gratuitement !</button>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <p class="text-center"><a href="#" id="signin">Vous avez déjà un compte ?</a></p>
                                </div>
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