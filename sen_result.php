
<?php

require_once("inc/config.php");

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
                                   
                                    
                                    <li class="dropdown" style="margin-top:1.07em">
   <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Senatorial Results
   <span class="caret"></span></button>
   <ul class="dropdown-menu">
    <li><a href="pres_result.php">Presidential</a></li>
     <li><a href="gov_result.php">Governorship</a></li>
     <li><a href="sen_result.php">Senatorial</a></li>
   </ul>
</li>


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



<section id="banner" class="wow fadeInUp">

    <div class="container">

        <h2 class="text-center">Recent Senatorial Election Results</h2><br><br>
        <div class="row" style="font-size: large; font-weight: bold" >
            <div class="col-md-2 col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Candidate Image</h4>
            </div>
            <div class="col-md-2 col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Candidate Name</h4>

            </div>
            <div class="col-md-1 col-xs-1">
                <h4 style="font-size: large; font-weight: bold" >Age</h4>

            </div>
            <div class="col-md-3 col-xs-3">
                <h4 style="font-size: large; font-weight: bold" >Party</h4>
            </div>
            <div class="col-md-2 col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Party Logo</h4>
            </div>
            <div class="col-md-2 col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Votes</h4>

            </div>
        </div>
        <hr>



            <?php

            $query = "SELECT * FROM candidates WHERE position = 'senatorial' ORDER BY vote_count DESC";
            $result = mysqli_query($connection, $query);


            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $id = $row['id'];
                $party_id = $row['party_id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $passport = $row['passport'];
                $age = $row['age'];
                $name = $first_name. ' '. $last_name;
                $vote_count = $row['vote_count'];



                ?>

                <div class="row">

                    <div class="col-md-2">

                        <img src="images/candidates/<?php echo $passport ?>" height="60" width="50" class="img-circle" />


                    </div>
                    <div class="col-md-2"><p class="text-capitalize"><?php echo $name ?></p> </div>
                    <div class="col-md-1"><?php echo $age ?> </div>


                    <?php
                    $party_query = "SELECT * FROM party WHERE id = {$party_id} LIMIT 1";
                    $select_party_id = mysqli_query($connection, $party_query);

                    while($row = mysqli_fetch_assoc($select_party_id)){
                        $party_name = $row['party_name'];
                        $party_logo = $row['party_logo'];


                        ?>

                        <div class="col-md-3"><p class="text-uppercase"><?php echo $party_name ?></p></div>
                        <div class="col-md-2">
                            <img src="images/party/<?php echo $party_logo ?>" width="60" class="" />
                        </div>

                    <?php } ?>

                    <div class="col-md-2">
                        <?php echo $vote_count ?>
                    </div>
                </div>
                <hr>
            <?php } ?>


    </div>
</section>




<?php

require_once("inc/footer.php");
?>