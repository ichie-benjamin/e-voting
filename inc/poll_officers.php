<div class="container">

    <div class="col-md-12 col-sm-12 wow fadeInRight" data-wow-delay=".8s">


        <div class="sub-heard-part">
            <ol class="breadcrumb m-b-0">
                <li><a href="admin.php">Admin</a></li>
                <li class="active">Poll Officers</li>
            </ol>
        </div>
        <!--//sub-heard-part-->


        <!--/profile-inner-->
        <div class="profile-section-inner">

            <div class="col-xs-6">




                <a class="btn btn-primary" href="admin.php?source=register_poll_officer">Register More Poll Officers</a><br><br>

                <?php  // UPDATE AND INCLUDE QUERY

                if(isset($_GET['edit'])) {

                    $cat_id = $_GET['edit'];
                    ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="party_name">Reset Password</label>

                            <?php

                            if(isset($_GET['edit'])){
                                $officer_id = $_GET['edit'];


                                $query_officer = "SELECT * FROM officer WHERE id = $officer_id";
                                $select_officer_id = mysqli_query($connection, $query_officer);

                                while($row = mysqli_fetch_assoc($select_officer_id)){
                                    $db_officer_id = $row['id'];



                                    ?>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <input value=""  class="form-control" type="text" name="officer_pass" required>

                                        </div>

                                    </div>
                                    <br>


                                <?php }} ?>

                            <?php

                            /// UPDATE QUERY

                            if(isset($_POST['update_poll_officer'])){
                                $the_password = $_POST['officer_pass'];
                                $hash = md5(md5($the_password));
//                                $the_party_abbr = strtoupper($_POST['party_abbr']);


                                $stmt = mysqli_prepare($connection, "UPDATE officer SET password = ? WHERE id = ? ");

                                mysqli_stmt_bind_param($stmt, 'si', $hash, $officer_id);

                                mysqli_stmt_execute($stmt);

                                mysqli_stmt_close($stmt);

                                if(!$stmt){
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }

                                header ("LOCATION: admin.php?source=poll_officers");
                            }
                            ?>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_poll_officer" value="Reset Password">
                            </div>
                        </div>

                    </form>


                    <?php

//                        include "includes/update_cats.php";




                }

                ?>



            </div><!--Add Category Form -->

            <div class="col-xs-6">

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <!--                        <th>Id</th>-->
                        <th>Username</th>
                        <th>Prof ID.</th>
                        <th colspan="2" class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $query = "SELECT * FROM officer";
                    $select_categories = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_categories)){
                        $username = $row['username'];
                        $prof_id = $row['prof_id'];
                        $poll_id = $row['id'];

                        echo "<tr>";


                        echo "<td>{$username}</td>";
                        echo "<td>{$prof_id}</td>";
                        echo "<td><a href='admin.php?source=poll_officers&delete={$poll_id}'>Delete</a></td>";
                        echo "<td><a href='admin.php?source=poll_officers&edit={$poll_id}'>Edit</a></td>";
                        echo "</tr>";
                    }

                    if(isset($_GET['delete'])){
                        $the_poll_id = $_GET['delete'];
                        $query = "DELETE FROM officer WHERE id = {$the_poll_id} ";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: admin.php?source=poll_officers");
                    }

                    ?>


                    </tbody>
                </table>
            </div>

            <div class="clearfix"></div>
        </div>

    </div>



</div>
