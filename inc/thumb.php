

<div class="container">


    <?php


    if(isset($_POST['update_biometrics'])) {


        $biometrics = sanitize($_FILES['user_thumb']['name']);
        $image_temp = sanitize($_FILES['user_thumb']['tmp_name']);
        
        
        $target_dir = "images/thumbs/";
        $target_file = $target_dir . basename($_FILES["user_thumb"]["name"]);


        if((user_exit('voters', 'biometrics', $biometrics ) !== 0)){


            $errors[] = 'This Voter Is Registered, The Details Is Shown Above';

            echo '<div class="row"><div class="col-md-6 col-md-offset-3"><a href="poll.php?source=thumb_upload" class="btn btn-success btn-block btn-lg">Register Another Voter</a></div></div><br>
';


            $bio_query = "SELECT * FROM voters WHERE biometrics = ? ";

            $stmt = mysqli_prepare($connection, $bio_query);

            mysqli_stmt_bind_param($stmt, 's', $biometrics);

            mysqli_stmt_execute($stmt);


            $result = mysqli_stmt_get_result($stmt);

            mysqli_stmt_close($stmt);


            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

echo "

           

           <table class='table table-bordered table-responsive'>
            <tr>
                <td>Voters_id.</td>
                <td>{$row['voters_id']}</td>
            </tr>
 
            <tr>
                <td>Voters_id.</td>
                <td>{$row['phone']}</td>
            </tr>

            <tr>
                <td>First Name.</td>
                <td>{$row['first_name']}</td>
            </tr>
            <tr>
                <td>Last Name.</td>
                <td>{$row['last_name']}</td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td>{$row['email']}</td>
            </tr>

        </table>
       
";


            }



        }

        if(empty($errors) === true && empty($_POST) === false) {


            
            $move = move_uploaded_file($_FILES["user_thumb"]["tmp_name"], $target_file);

            if($move){

                $query = "INSERT INTO voters(biometrics) VALUES(?)";

                $stmt = mysqli_prepare($connection, $query);

                mysqli_stmt_bind_param($stmt, 's', $biometrics);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);

                if(!$stmt){
                    die("QUERY FAILED" . mysqli_error($connection));
                }

                $_SESSION['voters_thumb'] = $biometrics;


                die('<div class="alert alert-success" style="margin-top: 180px"><p class="text-center">Success!!! Voters Biometrics Has Been Successfully verified!<br>You will be redirected to the 
                Registration Page In few seconds</p></div><meta http-equiv="refresh" content="7;url=http://localhost/e-vote/poll.php?source=register_voter" />');

            }else{
                $errors[] = 'Image Upload Failed';
            }

        }else {
            echo output_errors($errors);
        }

    }



    ?>

    <?php if(!isset($_POST['update_biometrics'])) { ?>
    <div class="page-header">
        <h1 class="h2">Upload Thumb</h1>
    </div>

    <div class="clearfix"></div>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">


        <table class="table table-bordered table-responsive">


            <tr>
                <td><label class="control-label">Upload Thumb.</label></td>
                <td>
                    <p><img src="images/uploadthumb.png" height="150" width="150" /></p>
                    <input class="input-group" type="file" name="user_thumb" accept="image/*" />
                </td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" name="update_biometrics" class="btn btn-default">
                        Upload Biometric
                    </button>


                </td>
            </tr>

        </table>

    </form>
    <?php } ?>

</div>

