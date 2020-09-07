

<div class="sub-heard-part">
    <ol class="breadcrumb m-b-0">
        <li><a href="index.php">Home</a></li>
        <li class="active"><?php echo date('Y'). ' '. $v_position; ?> Election Score Board</li>
    </ol>
</div>









<form action="" method="post">


    <table class="table table-bordered table-hover">








        <thead>
        <tr>

            <th>ID</th>
            <th>First Name</th>
            <th>First Last</th>
            <th>Age</th>
            <th>State</th>
            <th>Position</th>
            <th>Party</th>
            <th>Party Logo</th>
            <th>Votes</th>
            <!--            <th>Suspend</th>-->

        </tr>
        </thead>
        <tbody>

        <?php

        $query = "SELECT * FROM candidates WHERE position = '{$v_position}' ORDER BY vote_count DESC ";
        $select_posts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts)){
            $id = $row['id'];
            $email = $row['email'];

            $vote_count = $row['vote_count'];
            $state = $row['state_of_origin'];
            $first_name = $row['first_name'];
            $last_name= $row['last_name'];
            $party_id = $row['party_id'];
            $position = $row['position'];
            $age = $row['age'];


            echo "<tr>"; ?>


            <?php


            echo "<td>{$id}</td>";
            echo "<td class='text-capitalize'>{$first_name}</td>";
            echo "<td class='text-capitalize'>{$last_name}</td>";
            echo "<td>{$age} yrs</td>";

            echo "<td>{$state}</td>";
            echo "<td>{$position}</td>";


                $party_query = "SELECT * FROM party WHERE id = {$party_id} LIMIT 1";
                $select_party_id = mysqli_query($connection, $party_query);

                while($row = mysqli_fetch_assoc($select_party_id)) {
                    $party_name = $row['party_name'];
                    $party_logo = $row['party_logo'];

                    echo "<td>{$party_name}</td>";
                    echo "<td><img width='60' src='images/party/{$party_logo}'>";

                }



            echo "<td>{$vote_count}</td>";






//
//            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
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


