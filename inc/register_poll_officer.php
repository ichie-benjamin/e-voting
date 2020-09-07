
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<div class="container">

    <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
        <div class="omb_login">
            <h4 class="text-center">



                <?php


                if (isset($_POST['register_officer'])) {

                    $username = sanitize($_POST['username']);
                    $password = sanitize($_POST['password']);
                    $hash = md5(md5($password));

                    $randNum = rand(10000, 99999);
                    $prof_id = $randNum;

//                            die($party_abbr);


                    if (empty($errors) === true) {

                        if (user_exit('officer', 'username', $username) > 0) {

                            $errors[] = 'Sorry, The Username  \'' . $username . '\' Has Been Registered';

                        }


                    }


                    if (empty($errors) === true && empty($_POST) === false) {


                        $query = "INSERT INTO officer(username, password, prof_id) VALUES(?,?,?)";

                        $stmt = mysqli_prepare($connection, $query);

                        mysqli_stmt_bind_param($stmt, 'ssi', $username, $hash, $prof_id);

                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_close($stmt);

                        if(!$stmt){
                            die("QUERY FAILED" . mysqli_error($connection));
                        }


                        die("<div class='alert alert-success'><p class='text-center'>You Have Successfully Registered This User ($username) As A Poll Officer<br>
                </p><br><a class='btn btn-primary' href=''>Register More officers</a></div>");


                    } else {
                        echo output_errors($errors);
                    }


                }

                ?>

            </h4>

            <div class="row omb_row-sm-offset- omb_regOr">
                <div class="col-xs-12 col-sm-12">
                    <hr class="omb_hrOr">
                    <span class="omb_spanOr">Poll Officer Registration Page</span>
                </div>
            </div>

            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="form-group">
                            <label for="username">Officer Username *</label>
                            <input type="text" name="username" id="username" value="<?php if(isset($_POST['register_officer'])){ echo $_POST['username']; } ?>" class="form-control" placeholder="username" tabindex="1" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="officer">officer Password *</label>
                            <input type="text" name="password" id="officer" value=""   class="form-control" placeholder="Ppoll officer Password" tabindex="1" required >
                        </div>
                    </div>
                    <hr>


                </div>
                <button class="btn btn-lg btn-primary btn-block" name="register_officer" type="submit">Register Officer</button>
                <a class="btn btn-lg btn-success btn-block" href="admin.php?source=poll_officers">View Registered Officers</a>

            </form>

        </div>
    </div>






</div>

