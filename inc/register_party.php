
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <div class="container">

        <div class="col-md-6 col-md-offset-3 col-sm-12 wow fadeInRight" data-wow-delay=".8s">
            <div class="omb_login">
                <h4 class="omb_authTitle">Fill In Party Details</h4>

                <h4 class="text-center">



                    <?php


                        if (isset($_POST['register_party'])) {

                            $party_name = sanitize($_POST['party_name']);
                            $party_abbr = strtoupper(sanitize($_POST['party_abbr']));

//                            die($party_abbr);


                            if (empty($errors) === true) {

                                if (user_exit('party', 'party_abbr', $party_abbr) > 0) {

                                    $errors[] = 'Sorry, You Have Already Registered This Party \'' . $party_name . '\'';

                                }

                                
                                $image = sanitize($_FILES['image']['name']);
                                $image_temp = sanitize($_FILES['image']['tmp_name']);


                                $target_dir = "images/party/";
                                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                                
                                $move = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                              

                                if(!$move){

                                    $errors[] = 'Image Upload Failed';

                                }


                            }


                            if (empty($errors) === true && empty($_POST) === false) {


                                $query = "INSERT INTO party(party_name, party_abbr, party_logo) VALUES(?,?,?)";

                                $stmt = mysqli_prepare($connection, $query);

                                mysqli_stmt_bind_param($stmt, 'sss', $party_name, $party_abbr, $image);

                                mysqli_stmt_execute($stmt);

                                mysqli_stmt_close($stmt);

                                if(!$stmt){
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }


                                die("<div class='alert alert-success'><p class='text-center'>You Have Successfully Registered This Party ($party_name)<br>
                </p><br><a class='btn btn-primary' href=''>Register More Parties</a></div>");


                            } else {
                                echo output_errors($errors);
                            }


                        }

                    ?>

                </h4>

                <div class="row omb_row-sm-offset- omb_regOr">
                    <div class="col-xs-12 col-sm-12">
                        <hr class="omb_hrOr">
                        <span class="omb_spanOr">Party Registration Page</span>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="form-group">
                                <label for="party_name">Party Name *</label>
                                <input type="text" name="party_name" id="party_name" value="<?php if(isset($_POST['register_party'])){ echo $_POST['party_name']; } ?>" class="form-control" placeholder="Party Name" tabindex="1" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="party_abbr">Party Abbreviation *</label>
                                <input type="text" name="party_abbr" id="party_abbr" value="<?php if(isset($_POST['register_party'])){ echo $_POST['party_abbr']; } ?>"   class="form-control" placeholder="Party Abbreviation" tabindex="1" required >
                            </div>
                        </div>
                        <hr>
                        <div class="col-xs-12">
                            <hr>
                            <div class="form-group">
                                <label for="image">Party Logo *</label>
                                <input type="file" name="image" required>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-lg btn-primary btn-block" name="register_party" type="submit">Register Party</button>
                    <a class="btn btn-lg btn-success btn-block" href="admin.php?source=parties">View Registered Parties</a>

                </form>

            </div>
        </div>






    </div>

