
<?php

require_once("config.php");

if(!logged_in()){
    redirect('login.php');
}

?>


<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>(INEC) E-Voting Site</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                <a href="#" class="logo">
                    <img src="images/inec.png" height="50px">
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
                                    <li><a href="voting.php">Cast Vote</a></li>
                                    <li><a href="results.php">Results</a></li>

                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>



            <div class="col-md-3 col-xs-12 col-sm-3">
                <ul class="social-info">
                    <li class="hidden-xs">


                        <img height="28px" width="28px" class="img-responsive" src="images/sad-128.png" alt="">
                    </li>


                    <li class="dropdown-toggle hidden-xs" data-toggle="dropdown" style="font-size: 1.24em; padding-left: 1.12em; padding-top: 0">  <?php echo $_SESSION['username']. ' - '. $_SESSION['voters_id'] ?><span class="caret"></span></li>

                    <ul class="dropdown-menu">
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="reset_password.php">reset_pass</a></li>
                    </ul>

                </ul>
            </div>
        </div>
    </div>
</header>

