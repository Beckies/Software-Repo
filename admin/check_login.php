<?php
//define(DOC_ROOT,dirname(__FILE__)); // To properly get the config.php file
$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password
//$typ = $_POST['ltyp'];
require_once('../functions/ezzzy_function.php');
if($username == '' || $password == ''){
  display_error('All fields are required please');
}
$msg ='';
if(isset($username, $password)) {
    ob_start();
    include_once('config.php'); //Initiate the MySQL connection
    //require_once('../functions/sammysql.inc.php');
    //$ezzzy = new SamMysql($dbC);
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = mysqli_real_escape_string($con,$myusername);
    $mypassword = mysqli_real_escape_string($con,$mypassword);
     //let us check if the login type is admin
     //if($typ == 'Administrator'){
           $sql="SELECT * FROM userlogins WHERE username='$myusername' and password='$mypassword'";
        $result=mysqli_query($con,$sql) or die("Could not select table");
        // Mysql_num_row is counting table row
        $count=mysqli_fetch_array($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
         if($count['rec_id'] !=0 && $count['username'] ==$myusername){
            // Register $myusername, $mypassword and redirect to file "admin.php"
            if($count['usertyp'] == "ADMIN"){
              $det=mysqli_query($con,"SELECT * FROM login_admin WHERE username='$myusername' and password='$mypassword'");
              $dett=mysqli_fetch_array($con,$det);
            session_name("Admin");
            session_start();
            $_SESSION['name']= $dett['name'];
            $_SESSION['aid']= $dett['rec_id'];
            $_SESSION['rec']= $count['uid'];
            $_SESSION['log']="YES";

            $action_taken = "Admin User '". $_SESSION['name'] ."' has logged In";
     		//$ezzzy->logAction($count['uid'],$action_taken,"uactivity");

            header("location:index.php");
         }//end of the if statement that checks if the user is an ADMIN
         else if($count['usertyp'] == "INSTITUTION"){
           $det=mysqli_query($con,"SELECT * FROM institutions WHERE username='$myusername' and password='$mypassword'");
              $dett=mysqli_fetch_array($det);
           session_name("Inst");
            session_start();
            $_SESSION['recid']= $count['uid'];
            $_SESSION['name']= $dett['iname'];
            $_SESSION['pict']= $dett['picture'];
            $_SESSION['iid']= $dett['rec_id'];            
            $_SESSION['log']="YES";

            $action_taken = "User ". $_SESSION['name'] ." has logged In";
     		//$ezzzy->logAction($count['uid'],$action_taken,"uactivity");

            header("location:../school/index.php");
         }//end of the if statement that checks if the user is a Staff
         else if($count['usertyp'] == "DEPT"){
           $det=mysqli_query($con,"SELECT * FROM departments WHERE username='$myusername' and password='$mypassword'");
              $dett=mysqli_fetch_array($det);
            session_name("Dept");
            session_start();
            $_SESSION['recid']= $count['uid'];            
            $_SESSION['name']= $dett['deptname'];
            $_SESSION['schid']= $dett['schid'];
            $_SESSION['fid']= $dett['facid'];
            $_SESSION['did']= $dett['rec_id'];
            //$_SESSION['pict']= $dett['picture'];
            $_SESSION['log']="YES";

            $action_taken = "User ". $_SESSION['name'] ." has logged In";
     		//$ezzzy->logAction($count['uid'],$action_taken,"uactivity");

            header("location:../dept/index.php");
         }//end of the if statement that checks if the user is a departmental head
		 else if($count['usertyp'] == "LECTURER"){
		   $rec_id = $count['uid'];
           $det=mysqli_query($con,"SELECT * FROM excos WHERE rec_id='$rec_id'");
              $dett=mysqli_fetch_array($det);
            session_name("Lect");
            session_start();
            $_SESSION['recid']= $count['uid'];
            $_SESSION['name']= $dett['name'];
            $_SESSION['schid']= $dett['schid'];
            $_SESSION['fid']= $dett['facid'];
            $_SESSION['did']= $dett['did'];
            $_SESSION['lid']= $dett['rec_id'];
            //$_SESSION['pict']= $dett['picture'];
            $_SESSION['log']="YES";

            $action_taken = "User ". $_SESSION['name'] ." has logged In";
     		//$ezzzy->logAction($count['uid'],$action_taken,"uactivity");

            header("location:../lecturer/index.php");
         }//end of the if statement that checks if the user is a lecturer
         else if($count['usertyp'] == "MEMBER"){
           $det=mysqli_query($con,"SELECT * FROM members WHERE password='$password' and email='$username'");//ezzzy, please remember to change this query fields to the required
              $dett=mysqli_fetch_array($det);
            session_name("Members");
            session_start();
            $_SESSION['recid']= $count['uid'];
            $_SESSION['stdid']= $dett['member_id'];
            $_SESSION['name']= $dett['firstname']." ".$dett['lastname'];
            $_SESSION['nname']= $dett['nickname'];
            $_SESSION['phone']= $dett['phone'];
            $_SESSION['email']= $dett['email'];
            $_SESSION['schid']= $dett['schid'];
            $_SESSION['fid']= $dett['facid'];
            $_SESSION['did']= $dett['did'];
            $_SESSION['pict']= $dett['photo'];
            $_SESSION['log']="YES";

            $action_taken = "User ". $_SESSION['name'] ." has logged In";
     		//$ezzzy->logAction($count['uid'],$action_taken,"uactivity");

            header("location:../members/index.php");
         }//end of the if statement that checks if the user is a Student
        }//end of the if statement for the userlogins select
        else {
            $msg = "Wrong Username or Password. Please retry";
            header("location:../index.php?msg=$msg");
        }

    ob_end_flush();
}//end of the if isset $username & $password
else {
    header("location:../index.php?msg=Please enter some username and password");
}

?>