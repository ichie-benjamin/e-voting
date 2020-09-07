<div class="container">

    <div class="col-md-12 col-sm-12 wow fadeInRight" data-wow-delay=".8s">


            <div class="sub-heard-part">
                <ol class="breadcrumb m-b-0">
                    <li><a href="admin.php">Admin</a></li>
                    <li class="active">Parties</li>
                </ol>
            </div>
            <!--//sub-heard-part-->


            <!--/profile-inner-->
            <div class="profile-section-inner">

                <div class="col-xs-6">




                    <a class="btn btn-primary" href="admin.php?source=register_party">Register More Parties</a><br><br>

                    <?php  // UPDATE AND INCLUDE QUERY

                    if(isset($_GET['edit'])) {

                        $cat_id = $_GET['edit'];
?>

                    <form action="" method="post">
    <div class="form-group">
        <label for="party_name">Edit Party</label>

        <?php

        if(isset($_GET['edit'])){
            $party_id = $_GET['edit'];


            $query = "SELECT * FROM party WHERE id = $party_id ";
            $select_parties_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_parties_id)){
                $db_party_id = $row['id'];
                $db_party_name = $row['party_name'];
                $db_party_abbr = $row['party_abbr'];

                ?>



                <div class="row">
                    <div class="col-md-6">
                        <input value="<?php if(isset($db_party_name)){ echo $db_party_name;} ?>"  class="form-control" type="text" name="party_name">

                    </div>
                    <div class="col-md-6">
                        <input value="<?php if(isset($db_party_abbr)){ echo $db_party_abbr;} ?>"  class="form-control" type="text" name="party_abbr">

                        <br>
                    </div>
                </div>


            <?php }} ?>

                    <?php

                    /// UPDATE QUERY

                    if(isset($_POST['update_party'])){
                        $the_party_name = $_POST['party_name'];
                        $the_party_abbr = strtoupper($_POST['party_abbr']);


                        $stmt = mysqli_prepare($connection, "UPDATE party SET party_name = ?, party_abbr = ? WHERE id = ? ");

                        mysqli_stmt_bind_param($stmt, 'ssi', $the_party_name, $the_party_abbr, $party_id);

                        mysqli_stmt_execute($stmt);

                        mysqli_stmt_close($stmt);

                        if(!$stmt){
                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        header ("LOCATION: admin.php?source=parties");
                    }
                    ?>


                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="update_party" value="Update Party">
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
                            <th>Id</th>
                            <th>Party Name</th>
                            <th>Party Abbr.</th>
                            <th colspan="2" class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

<?php

                        $query = "SELECT * FROM party";
                        $select_categories = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($select_categories)){
                        $party_name = $row['party_name'];
                        $party_id = $row['id'];
                        $party_abbr = $row['party_abbr'];

                        echo "<tr>";

                            echo "<td>{$party_id}</td>";
                            echo "<td>{$party_name}</td>";
                            echo "<td>{$party_abbr}</td>";
                            echo "<td><a href='admin.php?source=parties&delete={$party_id}'>Delete</a></td>";
                            echo "<td><a href='admin.php?source=parties&edit={$party_id}'>Edit</a></td>";
                            echo "</tr>";
                        }

if(isset($_GET['delete'])){
    $the_party_id = $_GET['delete'];
    $query = "DELETE FROM party WHERE id = {$the_party_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: admin.php?source=parties");
}

?>


                        </tbody>
                    </table>
                </div>

                <div class="clearfix"></div>
            </div>

        </div>



    </div>
