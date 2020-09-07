

<div class="sub-heard-part">
    <ol class="breadcrumb m-b-0">
        <li><a href="index.php">Home</a></li>
        <li class="active">All Registered Voters For <?php echo date('Y'). ' '. $v_position; ?> Election</li>
    </ol>
</div>









<form action="" method="post">


    <table class="table table-bordered table-hover">








        <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox" name="checkbox" value=""></th>

            <th>Voters_Id</th>
            <th>username</th>
            <th>name</th>
            <th>email</th>
            <th>Mother's Maiden</th>
<!--            <th>voters_id</th>-->
            <th>occupation</th>
            <th>Religion</th>
            <th>State</th>
            <th>City</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Voted</th>
            <th>Voters Card</th>

        </tr>
        </thead>
        <tbody>

        <?php

        $query = "SELECT * FROM voters WHERE voters_id != '' ORDER BY id DESC ";
        $select_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts)){
//            $id = $row['post_id'];
            $username = $row['username'];
            $maiden_name = $row['maiden_name'];
            $email = $row['email'];

            $voters_id = $row['voters_id'];
            $occupation = $row['occupation'];
            $religion = $row['religion'];
            $phone = $row['phone'];
            $state = $row['state'];
            $city = $row['city'];
            $address = $row['residential_address'];
            $first_name = $row['first_name'];
            $last_name= $row['last_name'];
            $vote_president = $row['vote_president'];
            $vote_governor = $row['vote_governor'];
            $vote_senate = $row['vote_senatorial'];


            if($v_position == 'presidential' && $vote_president == 1){
                $voted = 'YES';
            }elseif ($v_position == 'governorship' && $vote_governor == 1){
                $voted = "YES";
            }elseif ($v_position == 'senatorial' && $vote_senate == 1){
                $voted = 'YES';
            }else {
                $voted = 'NO';
            }


            echo "<tr>"; ?>

            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value='<?php echo $post_id; ?>'></td>

            <?php

            echo "<td>{$voters_id}</td>";

            echo "<td>{$username}</td>";

//            echo "<td>{$email}</td>";



            echo "<td>{$first_name} {$last_name}</td>";

            echo "<td>{$email}</td>";
            echo "<td>{$maiden_name}</td>";
            echo "<td>{$occupation}</td>";
            echo "<td>{$religion}</td>";

//            echo "<td>{$phone}</td>";

            echo "<td>{$state}</td>";

            echo "<td>{$city}</td>";
            echo "<td>{$address}</td>";
            echo "<td>{$phone}</td>";
            echo "<td>{$voted}</td>";




//
            echo "<td><a href='poll.php?source=voter_id&v_id={$voters_id}'>View Card</a></td>";
//            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
//
//            echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
////        echo "<td><a onClick=\"javascript: return confirm('Are You Sure You Want To Delete This User?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
//
//            echo "<td><a href='admin.php?reset={$id}'>{$post_views_count}</a></td>";
            echo "</tr>";

        }



        ?>



        </tbody>
    </table>

</form>




<?php

if(isset($_GET['delete'])){
    $the_post_id = escape($_GET['delete']);

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}

if(isset($_GET['reset'])){
    $the_post_id = escape($_GET['reset']);

    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['reset']) ." ";
    $reset_query = mysqli_query($connection, $query);
    header("Location: posts.php");
}


?>



<script>

    $(document).ready(function(){
        $(".delete_link").on('click', function(){
            var id = $(this).attr("rel");

            var delete_url = "posts.php?delete="+ id +" ";

            $(".modal_delete_link").attr("href", delete_url);

            $("#myModal").modal('show');


        });
    });


</script>


