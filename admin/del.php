<?php
session_name("Admin");
session_start(); //Start the current session
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YESS"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../pages/login.php');
  exit;
}
$mytitle = ":: ADMIN";
$mid=@$_GET['id'];
$typ=@$_GET['typ'];
include_once('config.php');
require_once("../functions/ezzzy_function.php");
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
        <h2>DELETING - </h2>
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
             //let us check if we are to delete a member
              if($typ == 'mem'){
                $result=mysqli_query($con,"DELETE FROM members WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                  ?>
                  <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                  <?php
                }
              }//end of the if statement that checks if we are deleting a member
              else if($typ == 'cat'){
                $result=mysqli_query($con,"DELETE FROM postcat WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                    mysqli_query($con,"DELETE FROM scat WHERE catid='$mid'");
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }
              else if($typ == 'scat'){
                $result=mysqli_query($con,"DELETE FROM scat WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){                  
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting a media category
              else if($typ == 'book'){
                $result=mysqli_query($con,"DELETE FROM booklist WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting a media
              else if($typ == 'dep'){
                $result=mysqli_query($con,"DELETE FROM department WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting a department
              else if($typ == 'fcat'){
                $result=mysqli_query($con,"DELETE FROM fcat WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting a testimony
              else if($typ == 'acti'){
                $result=mysqli_query($con,"DELETE FROM uactivity WHERE id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting a user log
              else if($typ == 'exco'){
                $result=mysqli_query($con,"DELETE FROM excos WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting an event

              else if($typ == 'insti'){
                $result=mysqli_query($con,"DELETE FROM institutions WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting an staff
              else if($typ == 'advert'){
                $result=mysqli_query($con,"DELETE FROM adverts WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting an advert

              else if($typ == 'news'){
                $result=mysqli_query($con,"DELETE FROM news WHERE rec_id='$mid'") or die("Cannot perform delete");
                if($result){
                  show_success("Record has been deleted successfully");
                }
                ?>
                <h2 style="text-align: right"><a href="javascript: history.go(-1);"><b>&laquo;Back</b></a></h2>
                <?php
              }//end of the if statement that checks if we are deleting an prayer request
              else{
                display_error("Sorry!! You have made the wrong choice");
              }
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