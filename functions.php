<?php
function logged_in(){

return (isset($_SESSION['username']) && isset($_SESSION["user_email"]) && isset($_SESSION["voters_id"])) ? true : false;
}

function admin_logged_in(){

return (isset($_SESSION['admin_username']) && isset($_SESSION["admin_secret"])) ? true : false;
}

function poll_logged_in(){

return (isset($_SESSION['poll_username']) && isset($_SESSION["poll_id"])) ? true : false;
}

function output_errors($errors){
    return '<div class="alert alert-danger"><ul class="ul" style="list-style:none; padding: 5px; margin-top:7px"><li>' . implode('</li><li>', $errors) . '</li></ul></div>';
}

function is_admin(){

    return ($_SESSION['user_role'] === 'Administrator') ? true : false;
}


function redirect($location){
    header("Location: $location");

}



function confirmQuery($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED ." . mysqli_error($connection));
    }
}

function sanitize($data){
    global $connection;
    return mysqli_real_escape_string($connection, strip_tags(trim($data)));;
}


function user_exit($table, $field, $input){

    global $connection;

    $stmt = mysqli_prepare($connection, "SELECT id FROM $table WHERE $field = ? ");
    mysqli_stmt_bind_param($stmt, 's', $input);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    confirmQuery($stmt);
    return mysqli_stmt_num_rows($stmt);
}




function register_user()
{


    global $connection;
    if (isset($_POST['register'])) {
//                    $errors = array();


//        if (empty($_POST) === false) {


            $username = sanitize($_POST['username']);
            $voter_thumb = sanitize($_POST['voter_thumb']);
            $password = sanitize($_POST['password']);
            $hash = md5(md5($password));
            $email = sanitize($_POST['email']);
            $confirm_password = sanitize($_POST['confirm_password']);
            $first_name = sanitize($_POST['first_name']);
            $last_name = sanitize($_POST['last_name']);
            $maiden_name = sanitize($_POST['maiden_name']);
            $occupation = sanitize($_POST['occupation']);
            $religion = sanitize($_POST['religion']);
            $marital_status = sanitize($_POST['marital_status']);
            $secret_qus = sanitize($_POST['secret_qus']);
            $secret_ans = sanitize($_POST['answer']);
            $phone = sanitize($_POST['phone']);
            $city = sanitize($_POST['city']);
            $lga = sanitize($_POST['lga']);
            $state = sanitize($_POST['state']);
            $address = sanitize($_POST['address']);
            $bod = sanitize($_POST['birth_day']);
            $bom = sanitize($_POST['birth_month']);
            $boy = sanitize($_POST['birth_year']);
            $gender = sanitize($_POST['gender']);




//            $hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));



            $required_fields = array('username', 'password', 'confirm_password', 'lga', 'state', 'email');

            foreach ($_POST as $key => $value) {
                if (empty($value) && in_array($key, $required_fields) === true) {
                    $errors[] = 'Fields marked with an asterisk Are Required';
                    break 1;
                }
            }

            if (empty($errors) === true) {


                if (user_exit('voters', 'username', $username ) > 0) {

                    $errors[] = 'Sorry, The Username \'' . $username . '\' is already taken.';

                }

                if (user_exit('voters', 'biometrics', $voter_thumb ) < 1) {

                    $errors[] = 'Sorry, Biometrics Error';

                }

                if (preg_match("/\\s/", $username) == true) {
                    $errors[] = 'Sorry Username must not contain Spaces';
                }

                if (strlen($password) < 3) {
                    $errors[] = 'Sorry Your Password must be at least 6 characters';
                }

                if ($confirm_password !== $password) {
                    $errors[] = 'Your password do not match';
                }

                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $errors[] = 'A valid Email Address is Required';
                }


                if (user_exit('voters', 'email', $email) > 0) {

                    $errors[] = 'Sorry, The Email Address \'' . $email . '\' is already in Use.';

                }


            }


            if (empty($errors) === true && empty($_POST) === false) {

                $randNum = rand(11000000, 99999999);
                $voters_id = $randNum;



                $stmt = mysqli_prepare($connection, "UPDATE voters SET voters_id = ?, username = ?, email = ?, password = ?, first_name = ?, 
                last_name = ?, marital_status = ?, secret_qus = ?, secret_ans = ?, maiden_name = ?, phone = ?, residential_address = ?, LGA = ?, 
                state = ?, city = ?, birth_day = ?, birth_month = ?, birth_year = ?, sex = ?, religion = ?, occupation = ? WHERE biometrics = ? ");


                mysqli_stmt_bind_param($stmt, 'isssssssssissssiiissss', $voters_id, $username, $email, $hash, $first_name, $last_name, $marital_status,
                    $secret_qus, $secret_ans, $maiden_name, $phone, $address, $lga, $state, $city, $bod, $bom, $boy, $gender, $religion, $occupation,
                    $voter_thumb);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);


                if(!$stmt){
                    die("QUERY FAILED" . mysqli_error($connection));
                }


                $_SESSION['R_voters_id'] = $voters_id;


//				 Email the user their activation link
                $to = "$email";
                $from = "support@e-voting.com";
                $subject = 'Voters Registration';
                $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Your Voters Registration </title></head>
<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333;
font-size:24px; color:#CCC;">Voters Registration</div>
<div style="padding:24px; font-size:17px;">Hello '.$username.',<br /> <br>You Have Been Registered Successfully And Now Qualified To participate in the upcoming election<br />
    <br />Your Voting Id is : '.$voters_id.' <br /><br />
    <h3>You can vote for your desired candidate on election day<br /><br />
    
    <br /><br />You can Always Login using your:<br />* Voters ID: <b>'.$voters_id.'</b></div></body></html>';
                $headers = "From: $from\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                mail($to, $subject, $message, $headers);



                die("<div class='alert alert-success'><p class='text-center'>Congrate!! You Have Successfully Registered For Election This Year <br>We Have Sent a welcome email to $email <br>
                And will Get You redirected To Passport upload area In a few seconds</p></div><meta http-equiv='refresh' content='15;url=http://localhost/e-vote/poll.php?source=photo_upload' />");


            } else {
                echo output_errors($errors);
            }


    }
}

function register_candidate()
{


    global $connection;
    if (isset($_POST['register'])) {
//                    $errors = array();


//        if (empty($_POST) === false) {



            $email = sanitize($_POST['email']);
            $first_name = sanitize($_POST['first_name']);
            $last_name = sanitize($_POST['last_name']);
            $state = sanitize($_POST['state']);
            $position = sanitize($_POST['position']);
            $age = sanitize($_POST['age']);
            $party_id = sanitize($_POST['party_id']);





//            $hash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));



            $required_fields = array('first_name', 'last_name', 'email');

            foreach ($_POST as $key => $value) {
                if (empty($value) && in_array($key, $required_fields) === true) {
                    $errors[] = 'Fields marked with an asterisk Are Required';
                    break 1;
                }
            }

            if (empty($errors) === true) {


                if (preg_match("/\\s/", $first_name) == true) {
                    $errors[] = 'Sorry First Name must not contain Spaces';
                }


                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    $errors[] = 'A valid Email Address is Required';
                }


                if (user_exit('candidates', 'email', $email) > 0) {

                    $errors[] = 'Sorry, The Email Address \'' . $email . '\' is already in Use.';

                }


                $image = sanitize($_FILES['image']['name']);
                $image_temp = sanitize($_FILES['image']['tmp_name']);


                $target_dir = "images/candidates/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);

                $move = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);


                if(!$move){

                    $errors[] = 'Image Upload Failed';

                }

                if($position == 'presidential'){

                    $check_query = "SELECT * FROM candidates WHERE position = '{$position}' AND party_id = '{$party_id}' ";
                    $result = mysqli_query($connection, $check_query);
                    if(mysqli_num_rows($result) != 0){
                        $errors[] = 'A Candidate Has Been Registered Already Under The Chosen Party For General \'' . $position . '\' Election.';
                    }

                }else{

                    $check_query = "SELECT * FROM candidates WHERE position = '{$position}' AND party_id = '{$party_id}' AND state_of_origin = '{$state}' ";
                    $result = mysqli_query($connection, $check_query);
                    if(mysqli_num_rows($result) != 0){
                        $errors[] = 'A Candidate Has Been Registered Already Under The Chosen Party For \'' . $position . '\' Election.';
                    }
                }





            }


            if (empty($errors) === true && empty($_POST) === false) {


                $query = "INSERT INTO candidates(first_name, last_name, email, position, party_id, passport, age, state_of_origin) VALUES(?,?,?,?,?,?,?,?)";

                $stmt = mysqli_prepare($connection, $query);

                mysqli_stmt_bind_param($stmt, 'ssssisis', $first_name, $last_name, $email, $position, $party_id, $image, $age, $state);

                mysqli_stmt_execute($stmt);

                mysqli_stmt_close($stmt);

                if(!$stmt){
                    die("QUERY FAILED" . mysqli_error($connection));
                }

//				 Email the user their activation link
                $to = "$email";
                $from = "support@e-voting.com";
                $subject = 'Voters Registration';
                $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Your Voters Registration </title></head>
<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333;
font-size:24px; color:#CCC;">Voters Registration</div>
<div style="padding:24px; font-size:17px;">Hello '.$first_name.',<br /> <br>You Have Been Registered Successfully as a Candidate For This upcoming election<br />
    
    <h3>You are Qualified to be voted for on the Election Day<br /><br />
    
    <br /><br />You can Always check your votes <a href="voters.php"> here </a></b></div></body></html>';
                $headers = "From: $from\n";
                $headers .= "MIME-Version: 1.0\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\n";
                mail($to, $subject, $message, $headers);



                die("<div class='alert alert-success'><p class='text-center'>Congrate!! You Have Successfully Registered This Candidate For This Upcoming Election<br>
                </p><br><a class='btn btn-primary' href=''>Register More Candidates</a></div>");


            } else {
                echo output_errors($errors);
            }


    }
}



function login_user($location){

    global $connection;

    if(isset($_POST['login'])){

        $voters_id = $_POST['voters_id'];
        $password = $_POST['password'];

        $voters_id = sanitize($voters_id);
        $password = sanitize($password);

//        die($voters_id. ' ' .$password);

        $password = md5(md5($password));


        $required_fields = array('password','voters_id');

        foreach($_POST as $key=>$value){
            if(empty($value) && in_array($key, $required_fields) === true){
                $errors[] = 'Fields marked with an asterisk Are Required';
                break 1;
            }
        }


        if(empty($errors) === true){

//   Checking for errors



            if((user_exit('voters', 'voters_id', $voters_id ) === 0)){

                $errors[] = 'Sorry, The Voters ID \'' . $voters_id . '\' Is Not Registered
                ';

            }

            $query = "SELECT * FROM voters WHERE voters_id = '{$voters_id}' LIMIT 1";
            $select_user_query = mysqli_query($connection, $query);

            if(!$select_user_query){
                die("QUERY FAILED". mysqli_error($connection));
            }

            while($row = mysqli_fetch_array($select_user_query)){
                $db_username = $row['username'];
                $db_password = $row['password'];
                $db_voters_id = $row['voters_id'];
                $db_user_phone = $row['phone'];
                $db_user_email = $row['email'];
                $db_user_id = $row['id'];


//
//                    if(!password_verify($password,$db_password) ) {
//                        $errors[] = 'password incorrect';
//
//                    }

                if($password  != $db_password ) {
                    $errors[] = 'password incorrect';

                }


            }





        }

        if(empty($errors) === true && empty($_POST) === false){


//            if(password_verify($password,$db_password) ) {
            if($password == $db_password){

                $_SESSION['userid']   = $db_user_id;
                $_SESSION['username'] = $db_username;
                $_SESSION['password'] = $db_password;
                $_SESSION['voters_id'] = $voters_id;

                $_SESSION['user_email'] = $db_user_email;
                $_SESSION['user_phone'] = $db_user_phone;


                redirect(ROOT_URL.$location);

            }






        }else {
            echo output_errors($errors);
        }



    }

}

function login_admin($location){

    global $connection;

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $secret = $_POST['secret'];

        $username = sanitize($username);
        $password = sanitize($password);
        $secret = sanitize($secret);

//        die($voters_id. ' ' .$password);

        $password = md5(md5($password));

        $secret = md5(md5($secret));


        $required_fields = array('password','username');

        foreach($_POST as $key=>$value){
            if(empty($value) && in_array($key, $required_fields) === true){
                $errors[] = 'Both fields Are Required';
                break 1;
            }
        }


        if(empty($errors) === true){

//   Checking for errors



            if((user_exit('admin', 'username', $username ) === 0)){

                $errors[] = 'Sorry, The User \'' . $username . '\' Is Not An Admin
                ';

            }

            $query = "SELECT * FROM admin WHERE username = '{$username}' LIMIT 1";
            $select_user_query = mysqli_query($connection, $query);

            if(!$select_user_query){
                die("QUERY FAILED". mysqli_error($connection));
            }

            while($row = mysqli_fetch_array($select_user_query)){
                $db_username = $row['username'];
                $db_password = $row['password'];;
                $db_user_id = $row['id'];
                $db_admin_secret = $row['admin_secret'];


                if($password  != $db_password ) {
                    $errors[] = 'password incorrect';

                }


                if($secret  != $db_admin_secret ) {
                    $errors[] = 'Secret Code incorrect';

                }


            }





        }

        if(empty($errors) === true && empty($_POST) === false){

            if(($password == $db_password) && ($secret == $db_admin_secret)) {

                $_SESSION['userid']   = $db_user_id;
                $_SESSION['admin_username'] = $db_username;
                $_SESSION['password'] = $db_password;
                $_SESSION['admin_secret'] = $db_admin_secret;


                redirect(ROOT_URL.$location);

            }






        }else {
            echo output_errors($errors);
        }



    }

}

function login_poll($location){

    global $connection;

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $poll_id = $_POST['poll_id'];

        $username = sanitize($username);
        $password = sanitize($password);
        $poll_id = sanitize($poll_id);


        $password = md5(md5($password));


        $required_fields = array('password','username');

        foreach($_POST as $key=>$value){
            if(empty($value) && in_array($key, $required_fields) === true){
                $errors[] = 'Both fields Are Required';
                break 1;
            }
        }


        if(empty($errors) === true){

//   Checking for errors



            if((user_exit('officer', 'username', $username ) === 0)){

                $errors[] = 'Sorry, The User \'' . $username . '\' Is Not A Poll Officer
                ';

            }

            $query = "SELECT * FROM officer WHERE username = '{$username}' LIMIT 1";
            $select_user_query = mysqli_query($connection, $query);

            if(!$select_user_query){
                die("QUERY FAILED". mysqli_error($connection));
            }

            while($row = mysqli_fetch_array($select_user_query)){
                $db_username = $row['username'];
                $db_password = $row['password'];;
                $db_user_id = $row['id'];
                $db_poll_id = $row['prof_id'];


                if($password  != $db_password ) {
                    $errors[] = 'password incorrect';

                }


                if($poll_id  != $db_poll_id ) {
                    $errors[] = 'Poll Id incorrect';

                }


            }





        }

        if(empty($errors) === true && empty($_POST) === false){

            if(($password == $db_password) && ($poll_id == $db_poll_id)) {

                $_SESSION['userid']   = $db_user_id;
                $_SESSION['poll_username'] = $db_username;
                $_SESSION['password'] = $db_password;
                $_SESSION['poll_id'] = $db_poll_id;


                redirect(ROOT_URL.$location);

            }






        }else {
            echo output_errors($errors);
        }



    }

}


