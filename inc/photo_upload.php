
<?php


$query = "SELECT * FROM voters WHERE voters_id = ? ";

$stmt = mysqli_prepare($connection, $query);

mysqli_stmt_bind_param($stmt, 'i', $_SESSION['R_voters_id']);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

mysqli_stmt_close($stmt);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $db_passport = $row['passport'];


}

?>


<section id="banner" class="wow fadeInUp">
    <div class="container">

<div class="row">



<?php


if(isset($_POST['update_passport'])) {

    $image = sanitize($_FILES['image']['name']);
    $image_temp = sanitize($_FILES['image']['tmp_name']);
    
            
    $target_dir = "images/voters/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $move = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    if($move){

        $stmt = mysqli_prepare($connection, "UPDATE voters SET passport = ? WHERE voters_id = ? ");


        mysqli_stmt_bind_param($stmt, 'si', $image, $_SESSION['R_voters_id']);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        if(!$stmt){
            die("QUERY FAILED" . mysqli_error($connection));
        }

        die("<div class='alert alert-success'><p class='text-center'>Success!!! Voters Photo Has Been Uploaded, You Have Successfully Completed This Registration</p></div>
        <meta http-equiv='refresh' content='4;url=http://localhost/e-vote/poll.php?source=voter_id&v_id={$_SESSION['R_voters_id']}' />");

    }else{
        $errors[] = 'Image Upload Failed';
    }
}

    ?>

            <div class="col-md-6 col-md-offset-3">

                <form class="" role="form" enctype="multipart/form-data" method="post">
                    <div class="form-group">




                        <label for="Post_image">Upload  Passport</label><br>
                        <?php if($db_passport == NULL){?>
                            <img class="app-img" height="128px" src="images/sad-128.png" alt="">
                        <?php }else { ?>
                            <img class="app-img" height="168px" width="158px" src="images/voters/<?php echo $db_passport ?>" alt="">
                        <?php } ?>
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="update_passport" class="btn btn-primary btn-lg" value="Update Passport">
                    </div>

                </form>

            </div>
</div>
        </div>
    </div>
</section>
