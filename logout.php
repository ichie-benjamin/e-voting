<?php require_once("inc/config.php");


// Set Session data to an empty array
$_SESSION = array();

// Destroy the session variables
session_destroy();
// Double check to see if their sessions exists

redirect(ROOT_URL);
exit();
