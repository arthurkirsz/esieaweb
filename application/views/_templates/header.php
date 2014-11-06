<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Holiday</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL; ?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL; ?>public/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo URL; ?>public/css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="<?php echo URL; ?>public/css/sb-admin-2.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>public/css/app.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo URL; ?>public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo URL; ?>public/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- JQUI -->
    <link href="<?php echo URL; ?>public/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <!-- JQUI -->
    <link href="<?php echo URL; ?>public/css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css">
    <!-- JQUI -->
    <link href="<?php echo URL; ?>public/css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css">
    <!-- JQUI datepicker theme -->
    <link href="<?php echo URL; ?>public/css/nigran.datepicker.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo URL; ?>public/js/jquery-1.11.0.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery-ui.min.js"></script>
</head>
<body>
<div class="app">
    
    <div class="app-header-container">
        <div class="app-header">
            <a class="app-brand" href="#">
                <svg viewBox="0 0 24 24" style="float:left;margin-top:10px;" height="40px" width="40px" fill="#AAAAAA" preserveAspectRatio="xMidYMid meet" fit="" style="pointer-events: none; display: block;"><g><path d="M14,6l-3.8,5l2.9,3.8L11.5,16C9.8,13.8,7,10,7,10l-6,8h22L14,6z"></path></g></svg>
            </a>
            <ul class="header-tabs">
                <li>
                    <a class="<?php if ($this->checkForActiveController($filename, 'dashboard')) { echo 'active'; }?>" href="<?php echo URL; ?>dashboard/index">
                    <i class="fa fa-dashboard fa-lg"></i> Infos</a>
                </li>
                <li>
                    <a class="<?php if ($this->checkForActiveControllerAndAction($filename, 'request/add')) { echo 'active'; }?>" 
                        href="<?php echo URL; ?>request/add">
                        <i class="fa fa-plus-square-o fa-lg"></i>Créer
                    </a>
                </li>
                <li>
                    <a class="<?php if ($this->checkForActiveControllerAndAction($filename, 'request/index')) { echo 'active'; }?>" 
                        href="<?php echo URL; ?>request/index">
                        <i class="fa fa-tasks fa-lg"></i>Demandes
                    </a>
                </li>
                <li>
                    <a class="<?php if ($this->checkForActiveControllerAndAction($filename, 'request/handle')) { echo 'active'; }?>" 
                        href="<?php echo URL; ?>request/manage">
                        <i class="fa fa-cog fa-lg"></i>à traiter
                    </a>
                </li>

                
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <div class="gravatar" style="width: 30px;
                                                    height: 30px;
                                                    border-radius: 30px;
                                                    overflow: hidden;
                                                    display:inline-block;
                                                    border: 0px solid #0088CC;
                                                    vertical-align: middle;;">
                            <?php if (USE_GRAVATAR) { ?>
                                <img src='<?php echo Session::get('user_gravatar_image_url'); ?>'
                                     style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                            <?php } else { ?>
                                <img src='<?php echo Session::get('user_avatar_file'); ?>'
                                     style='width:<?php echo AVATAR_SIZE; ?>px; height:<?php echo AVATAR_SIZE; ?>px;' />
                            <?php } ?>
                        </div>
                        <!-- <i class="fa fa-user fa-lg"></i>   -->
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo URL; ?>login/showprofile"><i class="fa fa-user fa-lg"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-lg"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL; ?>login/logout"><i class="fa fa-sign-out fa-lg"></i> Se déconnecter</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
            </li>

            </ul>

           
        </div>
    </div>
  

    <!-- <ul class="account-menu">
        <li>
        <a href="login/changeaccounttype">Change account type</a>
        </li>
        <li  >
        <a href="login/uploadavatar">Upload an avatar</a>
        </li>
        <li>
        <a href="login/editusername">Edit my username</a>
        </li>
        <li>
        <a href="login/edituseremail">Edit my email</a>
        </li>
        <li>
        <a href="login/logout">Logout</a>
        </li>
    </ul> -->

    <div class="app-body-container">

        <div class="debug-helper-box" style="opacity: .5; position: fixed; 
        bottom: 0px; right: 20px;z-index:999;background: red;color: #fff; width: 500px; text-align:center; padding: 5px;">
            DEBUG HELPER: you are in the view: <?php echo $filename; ?>
        </div>

