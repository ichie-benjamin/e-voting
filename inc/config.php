<?php


ob_start();
session_start();


//error_reporting(E_ALL);
//
//ini_set('display_errors', 'On');
//session_destroy();

//defined("ABS_URL") ? null : define("ABS_URL", "")



defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");


defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

defined("DB_HOST") ? null : define("DB_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER", "root");

defined("DB_PASS") ? null : define("DB_PASS", "");

defined("DB_NAME") ? null : define("DB_NAME", "e-voting");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


require_once("functions.php");

//v_position -> 'presidential', 'governorship', 'senatorial'

$v_position = 'presidential';

$v_date = '19-Jun-2017';

define("ROOT_URL", "http://localhost/e-vote/");
//define("ADMIN_URL", "http://localhost/everbrook/public/bt-admin/");

//define("MAIN_ROOT_URL", "http://localhost/oxy/resource/");

$errors = array();

