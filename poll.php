<?php

require_once("inc/config.php");

if(!poll_logged_in()){
    redirect('poll_login.php');
}

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
            <div class="col-md-1 col-xs-6 col-sm-3">
                <a href="#" class="logo">
                    <img src="images/ine.png" height="40px">
                </a>
            </div>
            <div class="col-md-9 col-xs-6 col-sm-6">
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
                                    <li><a href="poll.php?source=voters">View Voters</a></li>
                                    <li><a href="poll.php?source=thumb_upload">Register Voter</a></li>
                                    <li><a href="poll.php?source=score">Score Board</a></li>

                                </ul>

                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>

            <div class="col-md-2 col-xs-12 col-sm-3">
                <ul class="social-info">
                    <li class="hidden-xs">


                        <img height="28px" width="28px" class="img-responsive" src="images/sad-128.png" alt="">
                    </li>


                    <li class="dropdown-toggle hidden-xs" data-toggle="dropdown" style="font-size: 1.24em; padding-left: 1.12em; padding-top: 0">  <?php echo $_SESSION['poll_username'] .' - ' . $_SESSION['poll_id'] ?><span class="caret"></span></li>

                    <ul class="dropdown-menu">
                        <!--                        <li><a href="#">Profile</a></li>-->
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="poll.php?source=reset_pass">Reset Password</a></li>
                    </ul>

                </ul>
            </div>



        </div>
    </div>
</header>


<section id="banner" class="wo fdeInUp">


    <?php

    //v_positions = president, governor, senatorial




    if(isset($_GET['source'])){
        $source = $_GET['source'];

    } else {
        $source = '';
    }

    switch($source) {


        case 'voters';
            include "inc/voters.php";
            break;

        case 'voter_id';
            include "inc/idcard.php";
            break;

        case 'results';
            include "inc/score.php";
            break;

        case 'reset_pass';
            include "inc/reset_pass.php";
            break;


        case 'register_voter';
            include "inc/register_voter.php";
            break;

        case 'thumb_upload';
            include "inc/thumb.php";
            break;

        case 'photo_upload';
            include "inc/photo_upload.php";
            break;


        default:
            include "inc/score.php";
            break;
    }


    ?>

</section>



<footer class="wow fadeInUp" data-wow-delay=".8s">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright © <?php echo date('Y'); ?> E-Voting System. All rights reserved.</p>

            </div>
        </div>
    </div>
</footer>



</body>
</html>
