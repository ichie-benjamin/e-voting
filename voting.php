
<?php

require_once("inc/header.php");




?>


<section id="banner" class="wow fadeInUp">
    <div class="row">



        <div class="container" >
            <div class="col-sm-6">
                <h3 class="text-uppercase"><?php echo $v_position ?> Election</h3>
            </div>
            <div class="col-sm-6 pull-right">

                <h3 class="pull-right">Today's Date : <?php echo $date = date('d-M-Y'); ?> ( <?php echo date('D'); ?> )</h3> </div>


            <?php

            $voters_query = "SELECT * FROM voters WHERE voters_id = {$_SESSION['voters_id']} LIMIT 1";
            $select_party_id = mysqli_query($connection, $voters_query);

            while($row = mysqli_fetch_assoc($select_party_id)) {
                $state = $row['state'];
            }




            if($v_date != date('d-M-Y')){
                die("<div class='alert alert-danger' style='margin-top: 180px'><p class='text-center'>Sorry, There is no Election Today, The Next {$v_position} Election is on {$v_date}</p></div>");
            }

            if(isset($_POST['proceed'])) {
                $candidate = $_POST['candidate'];

                $position = $v_position;

                $voters_id = $_SESSION['voters_id'];

                if (user_exit('results', 'voters_id', $_SESSION['voters_id']) > 0) {

                    die('<div class="alert alert-danger" style="margin-top: 180px"><p class="text-center">Sorry, You Are Only Allowed to Vote Once</p></div><meta http-equiv="refresh" content="15;url=http://localhost/e-vote" />');

                } else {

                    $insert_query = "INSERT INTO results(voters_id, candidates_id, position) VALUES(?,?,?)";

                    $stmt = mysqli_prepare($connection, $insert_query);

                    mysqli_stmt_bind_param($stmt, 'iis', $voters_id, $candidate, $position);

                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);

                    if (!$stmt) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }



                    $update_query = "UPDATE candidates SET vote_count = vote_count + 1 WHERE id = '".$candidate."' LIMIT 1";

                    $send_query = mysqli_query($connection, $update_query);

                    if(!$send_query){
                        die("Query Failed" . mysqli_error($connection));
                    }

                    if($v_position == 'presidential'){


                        $update_voter = "UPDATE voters SET vote_president = vote_president + 1 WHERE voters_id = '".$voters_id."' LIMIT 1";

                        $send_query = mysqli_query($connection, $update_voter);

                        if(!$send_query){
                            die("Query Failed" . mysqli_error($connection));
                        }


                    }elseif ($v_position == 'governorship'){


                        $update_voter = "UPDATE voters SET vote_governor = vote_governor + 1 WHERE voters_id = '".$voters_id."' LIMIT 1";

                        $send_query = mysqli_query($connection, $update_voter);

                        if(!$send_query){
                            die("Query Failed" . mysqli_error($connection));
                        }


                    }elseif ($v_position == 'senatorial'){



                        $update_voter = "UPDATE voters SET vote_senatorial = vote_senatorial + 1 WHERE voters_id = '".$voters_id."' LIMIT 1";

                        $send_query = mysqli_query($connection, $update_voter);

                        if(!$send_query){
                            die("Query Failed" . mysqli_error($connection));
                        }


                    }


                die('<div class="alert alert-success" style="margin-top: 180px"><p class="text-center">Success!!! Your Vote has been Counted!<br>You will be redirected to the 
                result page in few seconds</p></div><meta http-equiv="refresh" content="10;url=http://localhost/e-vote/results.php" />');
                }
            }



            //        echo $_SESSION['voters_id'];
            if(isset($_POST['vote'])){

                $candidates_id = $_POST['party'];



                $party_query = "SELECT * FROM candidates WHERE id = {$candidates_id} LIMIT 1";
                $select_party_id = mysqli_query($connection, $party_query);

                while($row = mysqli_fetch_assoc($select_party_id)){
                    $candidates_first_name = $row['first_name'];
                    $candidates_last_name = $row['last_name'];




         ?>


                    <div class="col-md-8 col-md-offset-2" style="margin-top: 180px">

                    <div class="alert alert-warning">
                        <p class="text-center">You Have Chosen To Cast Your Vote For This candidate (<?php echo $candidates_first_name. ' '. $candidates_last_name ?>)</p>
                        <p>Note : That once voted, You Vote will be counted and wont be edited, So make sure he is your chosen Candidate before You proceed</p>

                    </div>
                <?php } ?>


                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-lg btn-primary btn-block" type="submit"
                                >cancel</button>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" name="candidate" value="<?php echo $candidates_id ?>">
                                <button class="btn btn-lg btn-primary btn-block" name="proceed" type="submit"
                                >Cast Vote</button>
                            </div>

                        </div>

                    </form>

                </div>


            <?php


            }
            ?>



            <?php

            if (user_exit('results', 'voters_id', $_SESSION['voters_id'] ) > 0) {

                die('<div class="alert alert-danger" style="margin-top: 180px"><p class="text-center">Sorry, You Have Voted Already and Cannot Vote Again</p> </div>');

            }

            ?>


        </div>


    </div>


    <?php

    if(!isset($_POST['vote'])):
    ?>


    <div class="container">
        <h2 class="text-center">Please click the appropriate box for the canditate of your choice</h2><br><br>
        <div class="row" style="font-size: large; font-weight: bold" >

            <div class="col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Candidate Image</h4>
            </div>
            <div class="col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Candidate Name</h4>

            </div>
            <div class="col-xs-1">
                <h4 style="font-size: large; font-weight: bold" >Age</h4>

            </div>
            <div class="col-xs-3">
                <h4 style="font-size: large; font-weight: bold" >Party</h4>
            </div>
            <div class="col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Party Logo</h4>
            </div>
            <div class="col-xs-2">
                <h4 style="font-size: large; font-weight: bold" >Select</h4>

            </div>
        </div>
        <hr>

        <form method="post">

            <?php

            if($v_position == 'governorship' || $v_position == 'senatorial'){
                $query = "SELECT * FROM candidates WHERE position = '{$v_position}' AND state_of_origin = '{$state}' ";
                $result = mysqli_query($connection, $query);
            }else {
                $query = "SELECT * FROM candidates WHERE position = '{$v_position}' ";
                $result = mysqli_query($connection, $query);
            }


            if(mysqli_num_rows($result) == 0){
                die("<div class='alert alert-warning' style='margin-top: 3px'><p class='text-center'>Because You Are From $state State, You Are Not Entitled To Participate In This $v_position Election
                </p></div>");
            }


            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $id = $row['id'];
            $party_id = $row['party_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $passport = $row['passport'];
            $age = $row['age'];
                $name = $first_name. ' '. $last_name;



            ?>

            <div class="row">

                <div class="col-md-2">

                    <img src="images/candidates/<?php echo $passport ?>" height="50" width="60" class="img-circle" />


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
                    <input name="party" value="<?php echo $id ?>" onClick="javascript: return confirm('Are You Sure You are Casting Your Vote For This Candidate? Note: That You Are Allowed To vote Once In this election');"  type="radio" style="transform: scale(2);" required>
                </div>
            </div>
            <hr>
<?php } ?>


            <button class="btn btn-lg btn-primary btn-block" name="vote" type="submit"
                    >Cast Vote</button>


        </form>

        <?php endif; ?>

    </div>
</section>



<?php

require_once("inc/footer.php");
?>