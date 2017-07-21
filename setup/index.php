<?php
/**
 * ***************************************************************************************
 *                           (c) 2014                                                    *
 *                                                                                       *
 *   This script cannot be used or modified without permission.                          *
 *   Written by: Ezekiel Aliyu  EMAIL: zinconewton2@yahoo.com                            *
 *   																				     *
 *****************************************************************************************
 */	
// Get all required files
require_once("../functions/ezzzy_function.php");
require_once("../admin/config.php");
require_once("../functions/sammysql.inc.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="../styles/ezzzy.css">
	<title> Application Setup Page</title>
 </head>
 <body topmargin="0" leftmargin="0" bottommargin="0" rightmargin="0">

 <table align="center" bgcolor="#CCCCCC" width="650" style="margin-top: 40px"><tbody>

    <tr><td>

    <div style="padding-top: 30px">
    <?php
       // check if nothing is passed to this script
      $act = cleana($_POST['ACT']);
      if (!isset($act) || $act == "") {
      	// display the registration Start-up page
      	?>

      <p align="center"><b>Welcome! <br /><br />You are about to begin your database installation.</b> </p>
       <div>Before you continue, make sure you have performed the following:<br>
       <ul type="square">
        <li> Open the file named 'Config.php' with your notepad or text editor and make the neccessary Changes:</li>
        	<ul type="circle">
        	   <li><b>$server_name</b> - Should be localhost mostly </li>
        	   <li><b>$s_username</b> - Enter the username for your MySql database </li>
        	   <li><b>$s_password</b> - Enter the password for your MySql database </li>
        	   <li><b>$dbname</b> - Enter the name of the MySql database you created </li>
        	</ul>

         <li>Save the file, close it and upload it to a directory outside of your document root (www)  </li>
		 <li>Make sure the path to this  configuration file is correct as specified in the script 'configFile.php' as '$Configme'</li>
        </ul>
	   </div>
      <p align="center"> <b>Once the above is completed.<br /> Click the START button to begin installation.</b></p>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <center><input type="hidden" value="begi" name="ACT" /></center>
       <center><input type="submit" value=" START " /></center>
      </form>

      <?php

      }
      elseif ($act == "begi") {
      	// Let's create all the needed tables
       	///------------ CREATE THE ADVERT TABLE ---------------------////
	      echo "<b> Creating the <i style=\"color: #330099;\"> Advert's</i> Table ... </b>";;

	      $qryst1 = "CREATE TABLE IF NOT EXISTS `adverts` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `cname` varchar(255) NOT NULL,
          `title` varchar(255) NOT NULL,
          `adtyp` varchar(100) NOT NULL,
          `phone` varchar(50) NOT NULL,
          `email` varchar(100) NOT NULL,
          `address` varchar(255) NOT NULL,
          `country` varchar(100) NOT NULL,
          `state` varchar(100) NOT NULL,
          `descp` longtext NOT NULL,
          `dates` date NOT NULL,
          `times` time NOT NULL,
          `picture` varchar(255) NOT NULL,
          `status` varchar(50) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

	      $qryex1 = mysqli_query($con,$qryst1) or  die(mysqli_error($con));

	      if (!$qryex1) {
	        exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
	      }
	      else {
	      	echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
	      }

	      ///------------ CREATE THE COMMENTLIKE TABLE ---------------------////

	      echo "<b> Creating the <i style=\"color: #330099;\"> Commentlike's</i> Table ... </b>";

	      $qryst2 = "CREATE TABLE IF NOT EXISTS `commentlike` (
          `commentlikeid` int(11) NOT NULL AUTO_INCREMENT,
          `commentid` int(11) NOT NULL,
          `memberid` int(11) NOT NULL,
          PRIMARY KEY (`commentlikeid`)
        )";

	      $qryex2 = mysqli_query($con,$qryst2);

	      if (!$qryex2) {
	        exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
	      }
	      else {
	      	echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
	      }

	      ///------------ CREATE THE COUNTRY ---------------------////

	      echo "<b> Creating the <i style=\"color: #330099;\"> country's</i> Table ... </b>";

	      $qryst3 = "CREATE TABLE IF NOT EXISTS `country` (
          `country_code` char(2) NOT NULL,
          `country_name` varchar(60) NOT NULL,
          PRIMARY KEY (`country_code`)
        )";

	      $qryex3 = mysqli_query($con,$qryst3);

	      if (!$qryex3) {
	        exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
	      }
	      else {
	      	echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
	      }

          ///------------ CREATE THE DEPARTMENT ---------------------////

	      echo "<b> Creating the <i style=\"color: #330099;\"> Department's</i> Table ... </b>";

	      $qryst3a = "CREATE TABLE IF NOT EXISTS `departments` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `schid` int(11) NOT NULL,
          `facid` int(11) NOT NULL,
          `deptname` varchar(255) NOT NULL,
          `phone` varchar(100) NOT NULL,
          `email` varchar(100) NOT NULL,
          `deptdesc` varchar(255) NOT NULL,
          `username` varchar(100) NOT NULL,
          `password` varchar(100) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

	      $qryex3a = mysqli_query($con,$qryst3a);

	      if (!$qryex3a) {
	        exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
	      }
	      else {
	      	echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
	      }

         ///------------ CREATE THE EXCOS TABLE ---------------------////

         echo "<b> Creating the <i style=\"color: #330099;\"> excos </i> Table ... </b>";

         $qryst4 = "CREATE TABLE IF NOT EXISTS `excos` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `schid` int(11) NOT NULL,
          `facid` int(11) NOT NULL,
          `did` int(11) NOT NULL,
          `name` varchar(255) NOT NULL,
          `mail` varchar(255) NOT NULL,
          `phone` varchar(255) NOT NULL,
          `sex` varchar(9) DEFAULT NULL,
          `picture` varchar(255) NOT NULL,
          `portfolio` varchar(255) NOT NULL,
          `sess` varchar(25) NOT NULL,
          `etype` varchar(25) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

         $qryex4 = mysqli_query($con,$qryst4);

         if (!$qryex4) {
           exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
         }
         else {
            echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
         }


         ///------------ CREATE THE FACULTIES TABLE ---------------------////

         echo "<b> Creating the <i style=\"color: #330099;\"> faculties</i> Table ... </b>";

         $qryst5 = "CREATE TABLE IF NOT EXISTS `faculties` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `schid` int(11) NOT NULL,
          `facname` varchar(255) NOT NULL,
          `facdesc` varchar(255) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

         $qryex5 = mysqli_query($con,$qryst5);

         if (!$qryex5) {
           exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
         }
         else {
            echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
         }
         
         ///------------ CREATE THE FAQs TABLE ---------------------////

         echo "<b> Creating the <i style=\"color: #330099;\"> faqs </i> Table ... </b>";

         $qryst6 = "CREATE TABLE IF NOT EXISTS `faqs` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `question` varchar(255) NOT NULL,
          `answer` longtext NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

         $qryex6 = mysqli_query($con,$qryst6);

         if (!$qryex6) {
           exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
         }
         else {
            echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
         }

         
          ///------------ CREATE THE FRIENDS TABLE ---------------------////

         echo "<b> Creating the <i style=\"color: #330099;\"> friends </i> Table ... </b>";

         $qryst8 = "CREATE TABLE IF NOT EXISTS `friends` (
        `friend_id` int(11) NOT NULL AUTO_INCREMENT,
        `member_id` int(11) NOT NULL,
        `datetime` datetime NOT NULL,
        `group_id` int(11) NOT NULL,
        `status` varchar(11) NOT NULL,
        `friends_with` int(11) NOT NULL,
        PRIMARY KEY (`friend_id`)
      )";

         $qryex8 = mysqli_query($con,$qryst8);

         if (!$qryex8) {
           exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
         }
         else {
            echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
         }
	       ///------------ CREATE THE INSTITUTIONS TABLE ---------------------////

         echo "<b> Creating the <i style=\"color: #330099;\"> institutions</i> Table ... </b>";

         $qryst8a = "CREATE TABLE IF NOT EXISTS `institutions` (
        `rec_id` int(11) NOT NULL AUTO_INCREMENT,
        `iname` varchar(255) NOT NULL,
        `imail` varchar(100) NOT NULL,
        `iphone` varchar(50) NOT NULL,
        `address` varchar(255) NOT NULL,
        `username` varchar(50) NOT NULL,
        `password` varchar(50) NOT NULL,
        `ipname` varchar(255) NOT NULL,
        `picture` varchar(255) NOT NULL,
        `sess` varchar(20) NOT NULL,
        PRIMARY KEY (`rec_id`)
      )";

         $qryex8a = mysqli_query($con,$qryst8a);

         if (!$qryex8a) {
           exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
         }
         else {
            echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
         }
         
         ///------------ CREATE INVITE_STATUS TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> invite_status's </i> Table ... </b>";

          $qryst9 = "CREATE TABLE IF NOT EXISTS `invite_status` (
            `status_id` int(11) NOT NULL AUTO_INCREMENT,
            `status` int(11) NOT NULL,
            PRIMARY KEY (`status_id`)
          )";

          $qryex9 = mysqli_query($con,$qryst9);

          if (!$qryex9) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

         ///------------ CREATE LOGATTEMPT TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> logattempt's </i> Table ... </b>";

          $qryst10 = "CREATE TABLE IF NOT EXISTS `logattempt` (
            `email` varchar(55) NOT NULL,
            `nri` tinyint(3) unsigned DEFAULT '0',
            `ip` varchar(15) DEFAULT NULL,
            `dt` int(11) DEFAULT NULL,
            PRIMARY KEY (`email`)
          )";

          $qryex10 = mysqli_query($con,$qryst10);

          if (!$qryex10) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

          ///------------ CREATE LOGIN_ADMIN TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> login_admin's </i> Table ... </b>";

          $qryst11 = "CREATE TABLE IF NOT EXISTS `login_admin` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(100) NOT NULL,
          `phone` varchar(50) NOT NULL,
          `email` varchar(100) NOT NULL,
          `username` varchar(50) NOT NULL,
          `password` varchar(50) NOT NULL,
          `smsuser` varchar(50) NOT NULL,
          `smspass` varchar(50) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

          $qryex11 = mysqli_query($con,$qryst11);

          if (!$qryex11) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE MEMBERS TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> members' </i> Table ... </b>";

          $qryst12 = "CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `schid` int(11) NOT NULL,
  `facid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `student_id` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_added` datetime NOT NULL,
  `photo` varchar(300) NOT NULL,
  `interest` varchar(300) NOT NULL,
  `Education` varchar(200) NOT NULL,
  `elems` text NOT NULL,
  `elemyear` year(4) NOT NULL,
  `highschool` text NOT NULL,
  `hsyear` year(4) NOT NULL,
  `mentor` varchar(255) NOT NULL,
  `employer` text NOT NULL,
  `position` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `acode` varchar(100) NOT NULL,
  `creditbalance` double NOT NULL,
  PRIMARY KEY (`member_id`)
)";

          $qryex12 = mysqli_query($con,$qryst12);

          if (!$qryex12) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

          ///------------ CREATE THE MESSAGES CLASSES ---------------------////

	      echo "<b> Creating the <i style=\"color: #330099;\"> messages' </i> Table ... </b>";

	      $qryst3a = "CREATE TABLE IF NOT EXISTS `messages` (
            `message_id` int(11) NOT NULL AUTO_INCREMENT,
            `reciever_id` int(11) NOT NULL,
            `recipient_id` int(11) NOT NULL,
            `datetime` datetime NOT NULL,
            `content` varchar(100) NOT NULL,
            `status` varchar(50) NOT NULL,
            `recipient` varchar(100) NOT NULL,
            `receiver` varchar(100) NOT NULL,
            PRIMARY KEY (`message_id`)
          )";

	      $qryex3a = mysqli_query($con,$qryst3a);

	      if (!$qryex3a) {
	        exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
	      }
	      else {
	      	echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
	      }

          ///------------ CREATE NEWS TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> news' </i> Table ... </b>";

          $qryst12a = "CREATE TABLE IF NOT EXISTS `news` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `schid` int(11) NOT NULL,
          `did` int(11) NOT NULL,
          `memberid` int(11) NOT NULL,
          `title` varchar(255) NOT NULL,
          `descp` longtext NOT NULL,
          `dates` date NOT NULL,
          `times` time NOT NULL,
          `adates` date NOT NULL,
          `atimes` time NOT NULL,
          `ntype` varchar(100) NOT NULL,
          `venue` varchar(255) NOT NULL,
          `adt` datetime NOT NULL,
          `picture` varchar(255) NOT NULL,
          `price` double NOT NULL,
          `status` varchar(50) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

          $qryex12a = mysqli_query($con,$qryst12a);

          if (!$qryex12a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

          ///------------ CREATE NEWSCOMMENTS TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> newscomments' </i> Table ... </b>";

          $qryst11a = "CREATE TABLE IF NOT EXISTS `newscomments` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `newsid` int(11) NOT NULL,
          `memberid` int(11) NOT NULL,
          `dates` date NOT NULL,
          `comment` longtext NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

          $qryex11a = mysqli_query($con,$qryst11a);

          if (!$qryex11a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE PHOTOS TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> photos' </i> Table ... </b>";

          $qryst12a = "CREATE TABLE IF NOT EXISTS `photos` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `member_id` int(11) NOT NULL,
          `title` varchar(255) NOT NULL,
          `picture` varchar(255) NOT NULL,
          `typ` varchar(100) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

          $qryex12a = mysqli_query($con,$qryst12a);

          if (!$qryex12a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE POSTCOMMENTS TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> postcomments' </i> Table ... </b>";

          $qryst13a = "CREATE TABLE IF NOT EXISTS `postcomments` (
            `postcommentid` int(11) NOT NULL AUTO_INCREMENT,
            `postid` int(11) NOT NULL,
            `memberid` int(11) NOT NULL,
            `dates` date NOT NULL,
            `comment` varchar(300) NOT NULL,
            PRIMARY KEY (`postcommentid`)
          )";

          $qryex13a = mysqli_query($con,$qryst13a);

          if (!$qryex13a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE POSTLIKE TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> postlike' </i> Table ... </b>";

          $qryst14a = "CREATE TABLE IF NOT EXISTS `postlike` (
          `postlikeid` int(11) NOT NULL AUTO_INCREMENT,
          `postid` int(11) NOT NULL,
          `memberid` int(11) NOT NULL,
          PRIMARY KEY (`postlikeid`)
        ) ";

          $qryex14a = mysqli_query($con,$qryst14a);

          if (!$qryex14a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE POSTS TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> posts </i> Table ... </b>";

          $qryst15a = "CREATE TABLE IF NOT EXISTS `posts` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `member_id` varchar(50) NOT NULL,
          `actualpost` varchar(300) NOT NULL,
          `dates` datetime NOT NULL,
          `post_to` int(11) NOT NULL,
          `picture` varchar(255) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

          $qryex15a = mysqli_query($con,$qryst15a);

          if (!$qryex15a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE REPLY TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> reply's </i> Table ... </b>";

          $qryst16a = "CREATE TABLE IF NOT EXISTS `reply` (
          `messageid` int(11) NOT NULL AUTO_INCREMENT,
          `receiver` varchar(100) NOT NULL,
          `recipient` varchar(100) NOT NULL,
          `contentreply` text NOT NULL,
          `date` datetime NOT NULL,
          PRIMARY KEY (`messageid`)
        )";

          $qryex16a = mysqli_query($con,$qryst16a);

          if (!$qryex16a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE SITEINFO TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> siteinfo's </i> Table ... </b>";

          $qryst17a = "CREATE TABLE IF NOT EXISTS `siteinfo` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `page` varchar(255) DEFAULT NULL,
          `detail` longtext,
          PRIMARY KEY (`rec_id`),
          KEY `rec_id` (`rec_id`)
        )";

          $qryex17a = mysqli_query($con,$qryst17a);

          if (!$qryex17a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

           ///------------ CREATE UPLOAD TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> upload's </i> Table ... </b>";

          $qryst18a = "CREATE TABLE IF NOT EXISTS `upload` (
          `upload_id` int(11) NOT NULL AUTO_INCREMENT,
          `member_id` int(11) NOT NULL,
          `file_name` varchar(100) NOT NULL,
          `caption` varchar(100) NOT NULL,
          `datetime` datetime NOT NULL,
          UNIQUE KEY `upload_id` (`upload_id`)
        )";

          $qryex18a = mysqli_query($con,$qryst18a);

          if (!$qryex18a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

          ///------------ CREATE userlogins TABLE ---------------------////
         echo "<b> Creating the <i style=\"color: #330099;\"> userlogins </i> Table ... </b>";

          $qryst19a = "CREATE TABLE IF NOT EXISTS `userlogins` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT,
          `uid` int(11) NOT NULL,
          `email` varchar(100) NOT NULL,
          `phone` varchar(50) NOT NULL,
          `username` varchar(50) NOT NULL,
          `password` varchar(50) NOT NULL,
          `usertyp` varchar(100) NOT NULL,
          PRIMARY KEY (`rec_id`)
        )";

          $qryex19a = mysqli_query($con,$qryst19a);

          if (!$qryex19a) {
            exit ("<b style=\"color: #990000;\"> Error! could not create table </b>");
          }
          else {
              echo "<b style=\"color: #990000;\"> &nbsp;  Completed </b> <br />";
          }

       ?>

      <p align="center"><b> Completed creating of database Tables <br /><br />You are now ready to setup your program administration.</b> </p>

      <p align="center"> <b> Click the CONTINUE button to begin setup.</b></p>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <center><input type="hidden" value="coti" name="ACT" /></center>
       <center><input type="submit" value=" CONTINUE " /></center>
      </form>

      <?php
      }
      elseif ($act == "coti") {

      	// display admin registration form
      	include_once("register.php");
      }
      elseif ($act == "Regi") {
       // get all the passed values from registration form
      $adnam = cleana($_POST['admin_name']);
      $adunam = cleana($_POST['a_username']);
      $adpass = cleana($_POST['a_password']);
      $admail = cleana($_POST['a_email']);
      $adphone = cleana($_POST['a_phone']);

      // make sure the value are not empty
       if ($adnam =="" || $adunam =="" || $adpass =="" || $admail =="" || $adphone =="") {

       	 // this is not allowed, show registration page again
       	 include_once("register.php");

       }
       else {

      // Encrypt the password before adding it to database
       $nadpass = do_crypt($adpass);
     // Enter the Admin data records to the database

      $mqy1 = "INSERT INTO login_admin (name,phone,email,username,password) VALUES ('$adnam','$adphone','$admail','$adunam','$adpass')";
      $mqy2 = mysqli_query($con,$mqy1);
      $myq3 = mysqli_insert_id($con);
      mysqli_query($con,"INSERT INTO userlogins (uid,email,phone,username,password,usertyp) VALUES('$myq3','$admail','$adphone','$adunam','$adpass','ADMIN')");

      if (!$mqy2)
       {
        exit ("Error! Can't Add records to Admin Users table");
       }
      ?>

      <p align="center"><b>Congratulations! <br /><br />You have successfully completed administrative setup.<br>
      <i>Your Username</i> : <?php echo $adunam; ?><br />
      <i>Your Password</i> : <?php echo $adpass; ?> </b>    </p>

      <p align="center"> <b>You will now exit setup <br /> Click the NEXT button to continue.</b></p>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <center><input type="hidden" value="Cont" name="ACT" /></center>
       <center><input type="submit" value=" NEXT " /></center>
      </form>

      <?php
       }
      }
     elseif ($act == "Cont") // IF TO CONTINUE
     {

    ?>

      <p align="center"><b>Congratulations! <br /><br />You have successfully completed the setup of this database program.<br>
      You can now login to your administrative console <a href="../index.php">here</a> </b> </p>
    <?php
     }
      ?>
	</div> </td></tr>

	</tbody>

	</table>

	<p align="center" class="footer"> ©  <?php echo date("Y"); ?> <?php echo $mycompany; ?>  All rights reserved<br>
	Powered by: <a href="#">Ezekiel Aliyu, For SamolTechstudios</a> </p>

 </body>

 </html>
