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
                                    <li><a href="">(INEC) E-Voting Site Password Reset Page</a></li>

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


    <?php
    if(!isset($_GET['stage_two'])){ ?>

    <div class="container">

        <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
            <div class="omb_login">
                <h4 class="omb_authTitle">Password Reset Stage 1</h4>

                <h4 class="text-center">



                    <?php

                    if(isset($_POST['reset_pass'])) {

                        $email = $_POST['email'];


                        if (user_exit('voters', 'email', $email) < 1) {

                            $errors[] = 'Sorry, The Email Address \'' . $email . '\' is not Yet Registered.';

                        }


                        if(empty($errors) === true){


                            redirect('reset_pass.php?stage_two='.$email);


                        }else {
                            echo output_errors($errors);
                        }


                    }
                    ?>

                </h4>

                <div class="row omb_row-sm-offset- omb_regOr">
                    <div class="col-xs-12 col-sm-12">
                        <hr class="omb_hrOr">
                        <span class="omb_spanOr">Please Enter Your Email Address</span>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email Address"   class="form-control"  tabindex="1" required >
                    </div>




            </div>
            <button class="btn btn-lg btn-primary btn-block" name="reset_pass" type="submit">Reset Password</button>

            <a href="login.php" class="btn btn-lg btn-success btn-block">login</a>

            </form>

        </div>
    </div>

   <?php } ?>

<?php
    if(isset($_GET['stage_two'])){

    $email = $_GET['stage_two'];




        if (user_exit('voters', 'email', $email) == 0) {

            redirect('reset_pass.php');

        }



        $query_voters = "SELECT * FROM voters WHERE email = '".$email."' ";

        $select_voters = mysqli_query($connection, $query_voters);

        while($row = mysqli_fetch_assoc($select_voters)) {
            $db_secret_qus = $row['secret_qus'];
            $db_secret_ans = $row['secret_ans'];
            $db_maiden_name = $row['maiden_name'];

        }

    ?>




<div class="container">

    <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
        <div class="omb_login">
            <h4 class="omb_authTitle">Voters Password Reset Page Stage Two</h4>

            <h4 class="text-center">



                <?php

                if(isset($_POST['reset'])) {

                    $password = $_POST['password'];

                    $c_password = $_POST['c_password'];

                    $password = sanitize($password);

                    $c_password = sanitize($c_password);


                    $hash = md5(md5($password));

                    if($password  != $c_password ) {
                        $errors[] = 'password Does Not Match';

                    }

                    $maiden_name = $_POST['maiden_name'];
                    $secret_ans = $_POST['secret_ans'];


                    if(strtoupper($maiden_name)  != strtoupper($db_maiden_name)) {
                        $errors[] = 'Mother Maiden Name Does Not Match';

                    }
                    if(strtoupper($secret_ans)  != strtoupper($db_secret_ans)) {
                        $errors[] = 'Secret Answer Is Not Correct';

                    }

                    if(empty($errors) === true){


                        $update_query = "UPDATE voters SET password = '".$hash."' WHERE email = '" . $email . "' LIMIT 1";

                        $send_query = mysqli_query($connection, $update_query);

                        if (!$send_query) {
                            die("Query Failed" . mysqli_error($connection));
                        }

                        die("<div class='alert alert-success'><p class='text-center'>Success!! You Have Successfully Updated Your Password <br>
                And will Be Redirected To The Login Page In Few Seconds</p></div><meta http-equiv='refresh' content='12;url=http://localhost/e-vote/login.php' />");


                    }else {
                        echo output_errors($errors);
                    }


                }
                ?>

            </h4>

            <div class="row omb_row-sm-offset- omb_regOr">
                <div class="col-xs-12 col-sm-12">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">Please Fill These Informations</span>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="password">Secret Question *</label>
                    <input type="text" name="password" id="password" value="<?php echo $db_secret_qus ?>"   class="form-control" disabled tabindex="1" required >
                </div>
                <div class="form-group">
                    <label for="secret_ans">Answer *</label>
                    <input type="Answer Secret Answer" name="secret_ans" id="secret_ans" value="<?php if(isset($_POST['reset'])){ echo $_POST['secret_ans'];} ?>"   class="form-control" placeholder="Answer To The Secret Qus." tabindex="1" required >
                </div>

                <div class="form-group">
                    <label for="maiden_name">Mothers Maiden Name *</label>
                    <input type="text" name="maiden_name" id="maiden_name" value="<?php if(isset($_POST['reset'])){ echo $_POST['maiden_name'];} ?>"   class="form-control" placeholder="Enter Your Mothers Maiden Name" tabindex="1" required >
                </div>
                <div class="form-group">
                    <label for="password">New Password *</label>
                    <input type="password" name="password" id="password" value=""   class="form-control" placeholder="New Password" tabindex="1" required >
                </div>
                <div class="form-group">
                    <label for="c_pass">Re-enter Password *</label>
                    <input type="password" name="c_password" id="c_pass" value=""   class="form-control" placeholder="Re-enter Password" tabindex="1" required >
                </div>



        </div>
        <button class="btn btn-lg btn-primary btn-block" name="reset" type="submit">Reset Password</button>

        <a href="login.php" class="btn btn-lg btn-success btn-block">login</a>

        </form>

    </div>
</div>



  <?php  } ?>



</div>



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
