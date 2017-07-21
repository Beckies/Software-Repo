<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'softwarelib_db';
$items_per_group = 3;
//Connect to the database
$con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
$dbC = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
$mysqli = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
