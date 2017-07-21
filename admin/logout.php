<?php
session_name('Admin');
session_start(); //Start the current session
include_once('config.php'); //Initiate the MySQL connection
//require_once('../functions/sammysql.inc.php');
//$ezzzy = new SamMysql($con);
//$action_taken = "Admin User '". $_GET['nme'] ."' has logged out";
//$ezzzy->logAction($_GET['id'],$action_taken,"uactivity");
session_destroy(); //Destroy it! So we are logged out now
header("location:../index.php?msg=Successfully Logged out"); // Move back to login.php with a logout message
?>