<?php

require_once("inc/config.php");

?>



<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>(INEC) E-Voting Site Poll Login Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <!-- Fonts -->




    <!-- CSS -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsive.css">


    <!-- Js -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW(
        ).init();
    </script>


</head>
<body>


<header>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6 col-sm-3">
                <a href="poll.php" class="logo">
                    <img src="images/ineclogo.png" height="40px">
                </a>
            </div>
            <div class="col-md-6 col-xs-6 col-sm-6">
                <div class="menu">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="">(INEC) E-Voting Site Poll Officer Login Page</a></li>

                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>


        </div>
    </div>
</header>




<section id="banner" class="wow fadeInUp">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <div class="container">

        <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
            <div class="omb_login text-center">
                <h4 class="omb_authTitle">Pls Enter Your Login Details </h4>

                <h4 class="text-center"><?php login_poll('poll.php'); ?>

                </h4>

                <div class="row omb_row-sm-offset- omb_loginOr">
                    <div class="col-xs-12 col-sm-12">
                        <hr class="omb_hrOr">
                        <span class="omb_spanOr">Login</span>
                    </div>
                </div>

                <div class="row omb_row-sm-offset-">
                    <div class="col-xs-12 col-sm-12">
                        <form class="omb_loginForm" action="" autocomplete="off" method="POST">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input  type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input  type="text" class="form-control" name="poll_id" placeholder="poll Id">
                            </div>

                            <br>
                            <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>






    </div>
</section>

<footer class="wow fadeInUp" data-wow-delay=".8s">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright © 2017 E-Voting System. All rights reserved.</p>

            </div>
        </div>
    </div>
</footer>




</body>
</html>
