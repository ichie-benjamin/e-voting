<?php

 require_once("inc/config.php");

?>



<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online E-voting System</title>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-6 col-sm-3">
                <a href="index.php" class="logo">
                    <img src="images/ine.png" height="40px">
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
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active"><a href="login.php">Login</a></li>
                                    <li><a href="">About Us</a></li>
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

        <div class="col-md-6 col-sm-6 wow fadeInDown" data-wow-delay=".8s">



            <div class="row">
                <div class="col-sm-6 col-md-offset-3 col-xs-12">
                    <div class="phone">
                        <img alt="" src="images/iphone5s-ns.png" class="img-responsive">
                        <div class="iphone5-screen">
                            <div class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="images/vote-1804596_1920.jpg" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="images/evoting.png" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="images/evote.png" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="images/general.jpg" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="images/ballot.png" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
<br><br>


        <div class="col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
            <div class="omb_login text-center">
                <h3>Welcome To (INEC) E-Voting Site</h3>
                    <h4>Nigeria Election Monitoring / Controlling Council</h4>
                <h4 class="omb_authTitle">Pls Enter Your Voters ID And Password </h4>

                <h4 class="text-center"><?php login_user('results.php'); ?>

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
                                <input type="text" class="form-control" name="voters_id" placeholder="Voters Number">
                            </div>
                            <span class="help-block"></span>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input  type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <!--<span class="help-block">Password error</span>-->
<br>
                            <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>
                            <a href="reset_pass.php" class="btn btn-lg btn-success btn-block">Forgot Password</a>
                        </form>
                    </div>
                </div>


				
                <div class="row col-12">
                    <div class="col-xs-12 col-sm-6">
                        <p class="omb_forgotPwd">
                            <a href="#"></a>
                        </p>
                    </div>
<!--                    <div class="col-xs-12 col-sm-6">-->
<!--                        <p class="omb_forgotPwd">-->
<!--                            <a href="#">Forgot password?</a>-->
<!--                        </p>-->
<!--                    </div>-->
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
