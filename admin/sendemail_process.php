<?php
session_name("Admin");
session_start(); //Start the current session
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YESS"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../pages/login.php');
  exit;
}
$mytitle = ":: ADMIN";
include_once('../pages/admin_header.php');
?>
      <!-- end: Quick Help -->

    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>SEND EMAIL - </h2>
      </div>
    </div>
  </div>
</div>
<!-- end: Page title -->
<div class="row clearfix f-space10"></div>
<div class="container"> 
  <!-- row -->
  <div class="row">
    <div class="col-md-9 col-sm-12 col-xs-12 main-column box-block">
       <!-- This is the beginning of my manin content -->
		 <?php
            $to=$_POST['to'];
            $msg=$_POST['msg'];
            $subj=$_POST['sub'];
            $typ=$_GET['typ'];
            $hedder="info@adedamolao.com";

            if(isset($_POST['submit'])){
              if($to == '' || $msg == '' || $subj == ''){
                 display_error("Some fields are left blank, please fill them up");
              }
              //if all is well
              else{
                include_once('config.php');
                //let us check where the email is coming from
                if($typ == "mass"){
                 if($to == 'ALL MEMBERS'){
                   $sql="SELECT * FROM members";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['email'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    $me=@mail($mails,$sub,$msg,$hedder);
                    if($me){
                      show_success("Your message was sent successfully");
                    }
                    else{
                        display_error("Messages could not be sent");
                    }
                 } //end of the if statement for 'All Students'
                 if($to == 'ADMIN'){
                   $sql="SELECT * FROM login_admin";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['email'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    $me=@mail($mails,$sub,$msg,$hedder);
                    if($me){
                      show_success("Your message was sent successfully");
                    }
                    else{
                      display_error("Messages could not be sent");
                    }
                 }//end of if statement to All Lecturers
                 if($to == 'WORKERS'){
                   $sql="SELECT * FROM members WHERE dept!=''";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['email'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    $me=@mail($mails,$sub,$msg,$hedder);
                    if($me){
                      show_success("Your message was sent successfully");
                    }
                    else{
                      echo "Messages could not be sent";
                    }
                 }//end of if statement to ND 1
                 if($to == 'ND 2'){
                   $sql="SELECT * FROM members WHERE Level='ND 2'";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['e_mail'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    @mail($mails,$sub,$msg,$hedder);
                 }//end of if statement to ND 2
                 if($to == 'HND 1'){
                   $sql="SELECT * FROM members WHERE Level='HND 1'";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['e_mail'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    @mail($mails,$sub,$msg,$hedder);
                 }//end of if statement to HND 1
                 if($to == 'HND 2'){
                   $sql="SELECT * FROM members WHERE Level='HND 2'";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['e_mail'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    @mail($mails,$sub,$msg,$hedder);
                 }//end of if statement to HND 2
                 if($to == 'PRE-HND'){
                   $sql="SELECT * FROM members WHERE Level='PRE-HND'";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['e_mail'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    @mail($mails,$sub,$msg,$hedder);
                 }//end of if statement to PRE-HND
                 if($to == 'PRE-ND'){
                   $sql="SELECT * FROM members WHERE Level='PRE-ND'";
                   $result=mysqli_query($con,$sql) or die('could not select table');
                   while ($nums=mysqli_fetch_array($result)){

                    $mail[]= $nums['e_mail'];

                   }//end of while loop

                    $mails= implode(',',$mail);
                    //echo $mails;
                    @mail($mails,$sub,$msg,$hedder);
                 }//end of if statement to PRE-ND                
                }//end of the if statement that checks if the email is coming from the masses
              }// end of else statement if all is well!!!
            } //end of iff statement is the user clicks a submit button
           ?>
       <!-- This is the Ending of my manin content -->
    </div>
    <!-- side bar -->
    <?php include_once('../pages/right.php'); ?>
    <!-- end:sidebar -->
  </div>
  <!-- end:row -->
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>
<!-- footer -->
<?php include_once('../pages/foot.php'); ?>