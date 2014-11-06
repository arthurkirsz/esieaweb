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
                        <svg viewBox="0 0 24 24" style="float:left;margin-top:-5px;margin-right: 5px;" height="30px" width="30px" fill="#0088CC" preserveAspectRatio="xMidYMid meet" fit="" style="pointer-events: none; display: block;"><g><path d="M14,6l-3.8,5l2.9,3.8L11.5,16C9.8,13.8,7,10,7,10l-6,8h22L14,6z"></path></g></svg>
                        Holiday
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li> -->
                        <li>
                            <a href="<?php echo URL ?>login">Se connecter</a>
                        </li>
                        <li>
                            <a href="<?php echo URL ?>login/signup">Créer un compte</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div id="page-wrapper" style="background: #38556B;min-height: 500px;">
            <div class="container">
                <div class="row" style="margin-top:100px;">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Connectez vous à votre espace</h3>
                            </div>
                            <div class="panel-body">
                                <form role="form" action="<?php echo URL; ?>login/login" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="user_name" type="email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Mot de passe" name="user_password" type="password" value="">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="user_rememberme" type="checkbox" value="Remember Me">Se souvenir de moi pendant 2 semaines
                                            </label>
                                        </div>
                                        <!-- Change this to a button or input when using this as a form -->
                                        <input type="submit" class="btn btn-lg btn-primary btn-block" />
                                    </fieldset>
                                </form>
                                    <a href="<?php echo URL; ?>login/register">Créer un compte</a>
                                    |
                                    <a href="<?php echo URL; ?>login/requestpasswordreset">Réinitialiser le mot de passe</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </body>
</html>