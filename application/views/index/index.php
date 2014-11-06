<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login - Sanity</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo URL; ?>public/css/landing-page.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo URL; ?>public/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <svg viewBox="0 0 24 24" style="float:left;margin-top:-5px;margin-right: 5px;" height="30px" width="30px" fill="#0080FF" preserveAspectRatio="xMidYMid meet" fit="" style="pointer-events: none; display: block;"><g><path d="M14,6l-3.8,5l2.9,3.8L11.5,16C9.8,13.8,7,10,7,10l-6,8h22L14,6z"></path></g></svg>
                        Holiday
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Accueil</a>
                        </li>
                        <li>
                            <a href="#">Tarifs</a>
                        </li>
                        <li>
                            <a href="<?php echo URL ?>login">Se connecter</a>
                        </li>
                        <li>
                            <a href="<?php echo URL ?>login/register">Créer un compte</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Header -->
        <div class="intro-header">

            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-message">
                            <h1>Holiday</h1>
                            <h3>La gestion des congés simple. Et surtout gratuite.</h3>
                            <hr class="intro-divider">
                            <ul class="list-inline intro-social-buttons">
                                <li>
                                    <a href="https://twitter.com/" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                                </li>
                                <li>
                                    <a href="https://facebook.com/" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google +</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container -->

        </div>
        <!-- /.intro-header -->

        <!-- Page Content -->

        <div class="content-section-a">

            <div class="container">

                <div class="row">
                    <div class="col-lg-5 col-sm-6">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading">La gestion papier : <br>Non merci !</h2>
                        <p class="lead">Passez au numérique en remplaçant les feuilles de congés par un outil performant et gratuit. Créez un espace Holiday dès à présent.</p>
                    </div>
                    <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                        <img class="img-responsive" src="<?php echo URL; ?>public/img/ipad.png" alt="">
                    </div>
                </div>

            </div>
            <!-- /.container -->

        </div>
        <!-- /.content-section-a -->

        <div class="content-section-b">

            <div class="container">

                <div class="row">
                    <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading">Simplicité<br>et efficacité</h2>
                        <p class="lead">L'ergonomie de Holiday vous fera gagner du temps. Aucune connaissance n'est requise pour utiliser le service. </p>
                    </div>
                    <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                        <img class="img-responsive" src="<?php echo URL; ?>public/img/dog.png" alt="">
                    </div>
                </div>

            </div>
            <!-- /.container -->

        </div>
        <!-- /.content-section-b -->

        <div class="content-section-a">

            <div class="container">

                <div class="row">
                    <div class="col-lg-5 col-sm-6">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading">Gérer les demandes depuis n'importe où</h2>
                        <p class="lead">Holiday est disponible sur le web, mais aussi sur Android et iOS.</p>
                    </div>
                    <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                        <img class="img-responsive" src="<?php echo URL; ?>public/img/phones.png" alt="">
                    </div>
                </div>

            </div>
            <!-- /.container -->

        </div>
        <!-- /.content-section-a -->


        
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>


        <div class="banner">

            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <h2>Découvrez la philosophie Holiday</h2>
                    </div>
                    <div class="col-lg-6">
                        
                    </div>
                </div>
            </div>
            <!-- /.container -->

        </div>
        <!-- /.banner -->

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline">
                            <li>
                                <a href="#home">Accueil</a>
                            </li>
                            <li class="footer-menu-divider">&sdot;</li>
                            <li>
                                <a href="#about">A propos</a>
                            </li>
                            <li class="footer-menu-divider">&sdot;</li>
                            <li>
                                <a href="#services">Tarifs</a>
                            </li>
                            <li class="footer-menu-divider">&sdot;</li>
                            <li>
                                <a href="#contact">Contact</a>
                            </li>
                        </ul>
                        <p class="copyright text-muted small">Copyright &copy; Holiday 2014. Tous droits réservés</p>
                    </div>
                </div>
            </div>
        </footer>


        
        <!-- jQuery Version 1.11.0 -->
        <script src="<?php echo URL; ?>public/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>

    </body>
</html>