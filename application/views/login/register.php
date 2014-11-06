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


        <!-- Page Content -->

        <div class="content-section-a">

            <div class="container">

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="register-default-box">
        <h1>Créer un espace Holiday</h1>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>login/register_action" name="registerform">
            <div class="form-group">
                <label for="login_input_username">Login</label>
                <span style="display: block; font-size: 14px; color: #999;">(only letters and numbers, 2 to 64 characters)</span>
                <input class="form-control" placeholder="Enter type" id="login_input_username" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
            </div>
            


            <div class="form-group">
                <!-- the email input field uses a HTML5 email type check -->
                <label for="login_input_email">
                    Email
                    <span style="display: block; font-size: 14px; color: #999;">
                        (Veuillez saisir une <span style="text-decoration: underline; color: mediumvioletred;">adresse email existante</span>,
                        afin de recevoir le mail d'activation)
                    </span>
                </label>
                <input id="login_input_email" class="login_input form-control" type="email" name="user_email" required />
            </div>
            <div class="form-group">
                <label for="login_input_password_new">
                    Password (min. 6 characters!
                    <span class="login-form-password-pattern-reminder">
                        Please note: using a long sentence as a password is much much safer then something like "!c00lPa$$w0rd").
                        Have a look on
                        <a href="http://security.stackexchange.com/questions/6095/xkcd-936-short-complex-password-or-long-dictionary-passphrase">
                            this interesting security.stackoverflow.com thread
                        </a>.
                    </span>
                </label>
                <input id="login_input_password_new" class="login_input form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="login_input_password_repeat">Repeat password</label>
                <input id="login_input_password_repeat" class="login_input form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
            </div>
            <div class="form-group">
                <label for="login_input_company_name">
                    Société
                    <span style="display: block; font-size: 14px; color: #999;">(only letters and numbers, 2 to 64 characters)</span>
                </label>
                <input id="login_input_company_name" class="login_input form-control" type="text" name="company_name" required />
            </div>

            <!-- show the captcha by calling the login/showCaptcha-method in the src attribute of the img tag -->
            <!-- to avoid weird with-slash-without-slash issues: simply always use the URL constant here -->
            <img id="captcha" src="<?php echo URL; ?>login/showCaptcha" />
            <span style="display: block; font-size: 11px; color: #999; margin-bottom: 10px">
                <!-- quick & dirty captcha reloader -->
                <a href="#" onclick="document.getElementById('captcha').src = '<?php echo URL; ?>login/showCaptcha?' + Math.random(); return false">[ Reload Captcha ]</a>
            </span>
            <div class="form-group">

                <label>
                    Please enter these characters
                    <span style="display: block; font-size: 11px; color: #999;">
                        Please note: This captcha will be generated when the img tag requests the captcha-generation
                        (and a real image) from YOURURL/login/showcaptcha. As this is a client-side triggered request, the
                        $_SESSION["captcha"] dump in the footer will not show the captcha characters. The captcha generation
                        happens AFTER the rendering of the footer.
                    </span>
                </label>
                <input type="text" name="captcha" required />
            </div>
            
            <input type="submit"  name="register" value="Créer mon espace" />

        </form>
    </div>

    <?php if (FACEBOOK_LOGIN == true) { ?>
        <div class="register-facebook-box">
            <h1>or</h1>
            <a href="<?php echo $this->facebook_register_url; ?>" class="facebook-login-button">Register with Facebook</a>
        </div>
    <?php } ?>

</div>
