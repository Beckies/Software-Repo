<?php
session_name('Members');
session_start(); //Start the current session
include_once('../admin/config.php'); //Initiate the MySQL connection
session_destroy(); //Destroy it! So we are logged out now
session_name('Mebers');
session_start(); //Start the current session
//include_once('../admin/config.php'); //Initiate the MySQL connection
session_destroy(); //Destroy it! So we are logged out now
header("location:../index.php?msg=Successfully Logged out"); // Move back to login.php with a logout message
?>