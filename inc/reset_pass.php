
<div class="container">

    <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
        <div class="omb_login">
            <h4 class="omb_authTitle">Poll Officer Passport Reset Page</h4>

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

if(empty($errors) === true){


    $update_query = "UPDATE officer SET password = '".$hash."' WHERE username = '" . $_SESSION['username'] . "' LIMIT 1";

    $send_query = mysqli_query($connection, $update_query);

    if (!$send_query) {
        die("Query Failed" . mysqli_error($connection));
    }

    die("<div class='alert alert-success'><p class='text-center'>Congrate!! You Have Successfully Updated Your Password <br>
                And will Be Redirected To The Poll Officer Home Page In Few Seconds</p></div><meta http-equiv='refresh' content='15;url=http://localhost/e-vote/poll.php' />");


}else {
    echo output_errors($errors);
}


}
?>

            </h4>

            <div class="row omb_row-sm-offset- omb_regOr">
                <div class="col-xs-12 col-sm-12">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">Enter New Password</span>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">


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

            </form>

        </div>
    </div>






</div>