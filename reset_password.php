
<?php

require_once("inc/header.php");
?>



<section id="banner" class="wow fadeInUp">


    <?php


        $email = $_SESSION["user_email"];



        $query_voters = "SELECT * FROM voters WHERE email = '".$email."' ";

        $select_voters = mysqli_query($connection, $query_voters);

        while($row = mysqli_fetch_assoc($select_voters)) {
            $db_password = $row['password'];
//        die($db_password);
        }

        ?>




        <div class="container">

            <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
                <div class="omb_login">
                    <h4 class="omb_authTitle">Voters Password Reset Page </h4>

                    <h4 class="text-center">



                        <?php

                        if(isset($_POST['reset'])) {

                            $password = $_POST['password'];

                            $e_password = $_POST['e_password'];

                            $c_password = $_POST['c_password'];

                            $password = sanitize($password);

                            $e_password = sanitize($e_password);

                            $e_hash = md5(md5($e_password));

                            $c_password = sanitize($c_password);


                            $hash = md5(md5($password));

                            if($db_password  != $e_hash ) {
                                $errors[] = 'The Old Password You Entered Is Incorrect';

                            }

                            if($password  != $c_password ) {
                                $errors[] = 'New passwords Does Not Match';

                            }



                            if(empty($errors) === true){


                                $update_query = "UPDATE voters SET password = '".$hash."' WHERE email = '" . $email . "' LIMIT 1";

                                $send_query = mysqli_query($connection, $update_query);

                                if (!$send_query) {
                                    die("Query Failed" . mysqli_error($connection));
                                }

                                die("<div class='alert alert-success'><p class='text-center'>Success!! You Have Successfully Updated Your Password <br>
                And will Be Redirected To The Results Page In Few Seconds</p></div><meta http-equiv='refresh' content='10;url=http://localhost/e-vote/results.php' />");


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
                            <label for="e_password">Enter Existing Password *</label>
                            <input type="password" name="e_password" id="e_password" value=""   class="form-control" placeholder="Enter Old Password" tabindex="1" required >
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

                <a href="results.php" class="btn btn-lg btn-success btn-block">Visit Home</a>

                </form>

            </div>
        </div>





    </div>



</section>


<?php

require_once("inc/footer.php");
?>
