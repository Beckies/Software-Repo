<?php
session_name("Members");
session_start(); //Start the current session
$sid = $_SESSION['stdid'];
include_once('../admin/config.php');
require_once('../functions/sammysql.inc.php');
$ezzzy = new SamMysql($con);
$midd = $_SESSION['stdid'];
$updateid;
//$posti = explode("-",$_POST['thepostid']);
$postid = $_POST['frmid'];
if(isset($_POST['frmid']))
{

	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
	  echo "postid = ". $postid."<br />";
  echo "The Post=". $_POST['nname']."<br />";
	die("Oops!! Not an Ajax Request! Talk to ezzzy Pls");
	}

    /**Let us the section of the form data the we are processing*/
            $frmid=$_POST['frmid'];
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $nname=$_POST['nname'];
            $desc=$_POST['desc'];
            //$datetime=$_POST['datetime'];
            $datetime1=$_POST['datetime1'];
            $datetime2=$_POST['datetime2'];
            //$datetime3=$_POST['datetime3'];
            $prisch=$_POST['prisch'];
            $highschool=$_POST['highschool'];
            $facass=$_POST['facass'];
            $detass=$_POST['detass'];
            $stass=$_POST['stass'];
            $fplans=$_POST['fplans'];
            $movies=$_POST['movies'];
            $music=$_POST['music'];
            $video=$_POST['video'];
            $mentor=$_POST['mentor'];
            $hobbies=$_POST['hobbies'];
            $interest=$_POST['interest'];
            $phone=$_POST['phone'];
		
            $frmid=$_POST['frmid'];
			//all is well
			if($frmid == "frm1"){         
              $sql="UPDATE members SET firstname='$fname',lastname='$lname',nickname='$nname',phone='$phone',address='$desc',birthdate='$datetime1' WHERE member_id='$midd'";
			  }//end of frm 1
			  else if($frmid == "frm2"){         
              $sql="UPDATE members SET primsch='$prisch',primschyear='$datetime2',highschool='$highschool',hsyear='$datetime3' WHERE member_id='$midd'";
			  }//end of frm 1
			  else if($frmid == "frm3"){         
              $sql="UPDATE members SET hostel='$hostel',facass='$facass',detass='$detass',stateass='$stass'fplans='$fplans' WHERE member_id='$midd'";
			  }//end of frm 1
			  else if($frmid == "frm4"){         
              $sql="UPDATE members SET interest='$interest',hobbies='$hobbies',movies='$movies',music='$music',videos='$video',mentor='$mentor' WHERE member_id='$midd'";
			  }//end of frm 1
              $qr=mysqli_query($con,$sql) or die('could not perform insertion'.  mysqli_error($con));
              $updateid = mysqli_insert_id($con);
              if($qr){
                //die('Success!');
                /********************************************************************************************/
                echo "Success";

                      
						}//end of the if statement that checks for the success
              /********************************************************************************************/
              }//end of the if statement that says we have an event
  //}//end of the if statement that checks the uploaded file
else
{
  echo "postid = ". $postid."<br />";
  echo "The Post=". $_POST['thecore']."<br />";
	die('Something wrong with Comment!');
}

