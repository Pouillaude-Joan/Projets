<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

    <title>RH - Gestionnaire en ligne d'employ&eacutees</title>

    <link rel="shortcut icon" href="../images/gt_favicon.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="../css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="../css/main.css">

    <HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries>

        <!--
        // $browser = get_browser(null, true);
        // if ($browser['parent'] == 'IE 9') {
        //     echo "<script src='../js/html5shiv.js'></script>";
        //     echo "<script src='../js/respond.min.js'></script>";
        // }
	-->

</head>

<body class="home">
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top headroom">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="../index.php"><img src="../images/logo.png" alt="Progressus HTML5 template"></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right">
                    <li><a href="#">Contacts </a></li>
                    <li><a class="btn" href="#">S'inscrire / Se connecter</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <!-- /.navbar -->
    <!-- Header -->
    <header id="head">
        <div class="container">
            <div class="row">
                <h1 class="lead">RAPIDE, INTELLIGENT, EFFICACE</h1>
                <p class="tagline">PROGRESSUS: site de gestion RH Gratuit par <a href="http://www.gettemplate.com/?utm_source=progressus&amp;utm_medium=template&amp;utm_campaign=progressus">Florian Abgrall</a></p>
                <p><a href='../controllers/EmpCreationController.php' class="btn btn-default btn-lg" role="button">AJOUTER UN EMPLOYER</a> <a href='../controllers/ServCreationController.php' class="btn btn-default btn-lg" role="button">AJOUTER UN SERVICE</a></p>
                <p><a href='../controllers/EmpListController.php' class="btn btn-default btn-lg" role="button">LISTE DES EMPLOYERS</a> <a href='../controllers/ServListController.php' class="btn btn-default btn-lg" role="button">LISTE DES SERVICES</a></p>
            </div>
        </div>
    </header>
    <!-- /Header -->
    <!-- Intro -->
    <div class="container text-center">
        <br> <br>
        <h2 class="thin"></h2>
        <p class="text-muted">
            <br>

        </p>
    </div>
    <!-- /Intro-->

    <!-- Highlights - jumbotron -->
    <div class="jumbotron top-space">
        <div class="container">

            <h3 class="text-center thin"></h3>

            <div class="row">

                <h1>Creation d'un nouvel employé</h1>
                <form method="POST" action="../controllers/CreateEmpController.php">

                    <input type="text" placeholder="Nom de l'employé" name="nom"> <br>
                    <input type="text" placeholder="Prénom de l'employé" name="prenom"> <br>
                    <input type="text" placeholder="Nom de l'emploi" name="emploi"> <br>
                    <input type="text" placeholder="Supérieur" name="sup"> <br>
                    <input type="text" placeholder="Date d'embauche" name="embauche"> <br>
                    <input type="text" placeholder="Salaire" name="sal"> <br>
                    <input type="text" placeholder="Commission" name="comm"> <br>
                    <input type="text" placeholder="Numéro du service" name="noserv"> <br>


                    <button>Valider</button>
                </form>
            </div> <!-- /row  -->

        </div>

    </div>
    <!-- /Highlights -->

    <!-- container -->
    <div class="container">

        <h2 class="text-center top-space"></h2>
        <br>

        <div class="row">
            <div class="col-sm-6">
                <h3></h3>
                <p> <a href="http://www.sublimetext.com/"></a></p>
            </div>
            <div class="col-sm-6">
                <h3></h3>
                <p>
                    <a href="http://unsplash.com"></a>
                    <a href="http://www.flickr.com/creativecommons/by-2.0/tags/"></a>
                </p>
            </div>
        </div> <!-- /row -->

        <div class="row">
            <div class="col-sm-6">
                <h3></h3>
                <p>
                    <a href="http://creativecommons.org/licenses/by/3.0/"></a>,

                </p>
            </div>
            <div class="col-sm-6">
                <h3></h3>
                <p></p>
            </div>
        </div> <!-- /row -->

        <!-- <div class="jumbotron top-space">
<h4></h4>
<p class="text-right"><a class="btn btn-primary btn-large"></a></p>
</div> -->

    </div> <!-- /container -->

    <!-- Social links. @TODO: replace by link/instructions in template -->
    <section id="social">
        <div class="container">
            <div class="wrapper clearfix">
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_linkedin_counter"></a>
                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                </div>
                <!-- AddThis Button END -->
            </div>
        </div>
    </section>
    <!-- /social links -->


    <footer id="footer" class="top-space">

        <div class="footer1">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 widget">
                        <h3 class="widget-title">Contact</h3>
                        <div class="widget-body">
                            <p><br>
                                <a href="mailto:#">some.email@somewhere.com</a><br>
                                <br>
                                234 Hidden Pond Road, Ashland City, TN 37015
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 widget">
                        <h3 class="widget-title">Follow me</h3>
                        <div class="widget-body">
                            <p class="follow-me-icons">
                                <a href=""><i class="fa fa-twitter fa-2"></i></a>
                                <a href=""><i class="fa fa-dribbble fa-2"></i></a>
                                <a href=""><i class="fa fa-github fa-2"></i></a>
                                <a href=""><i class="fa fa-facebook fa-2"></i></a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <h3 class="widget-title">Text widget</h3>
                        <div class="widget-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
                            <p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

        <div class="footer2">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="simplenav">
                                <a href="#">Home</a> |
                                <a href="#">About</a> |
                                <a href="#">Sidebar</a> |
                                <a href="#">Contact</a> |
                                <b><a href="#">Sign up</a></b>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 widget">
                        <div class="widget-body">
                            <p class="text-right">
                                Copyright &copy; 2014, Your name. Designed by <a href="#" rel="designer">PipeauFlow</a>
                            </p>
                        </div>
                    </div>

                </div> <!-- /row of widgets -->
            </div>
        </div>

    </footer>





    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="../js/headroom.min.js"></script>
    <script src="../js/jQuery.headroom.min.js"></script>
    <script src="../js/template.js"></script>
</body>

</html>