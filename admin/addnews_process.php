<?php
session_name("Admin");
session_start(); //Start the current session
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YESS"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../pages/login.php');
  exit;
}
$mytitle = ":: ADMIN";
$aid = $_SESSION['rec'];
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
        <h2>ADD NEWS - </h2>
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
								//let us include all necessary files
								$typ = $_GET['typ'];
								$target="pic";
								require_once("../functions/ezzzy_function.php");
								 //let us get the parsed variables
								 if($typ == "new"){
								 $tit = mysqli_real_escape_string($con, $_POST['title']);
								 $desc = mysqli_real_escape_string($con, $_POST['desc']);
								 $ad=date('Y-m-d');
								 $at=prepdate(time('h-i-s'));
								 $adt=prepdate(time());
								 $t=time('h-i-s');
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($tit == "" || $desc == ""){
								   display_error("All fields are required please");
								 }
								 else{
								   //all is now well
									/****************************************************************************************/
               if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
			   $p = $_FILES['pic']['type'];
			   $pi = explode("/",$p);
			   if ($pi[0] != "image") {
			   display_error("The file you want to upload can only be an image. To correct this please try to Edit the record");
			   }
			   $uiname = basename($_FILES['pic']['name']); // true name of image
               // copy the temp document to the place for storage
               move_uploaded_file($_FILES['pic']['tmp_name'], $target . "/" .$uiname);
               //prepare document for database
               // prepare new name for picture
               $newpic = $uiname;
               $filestore = $target ."/".$newpic;
               $filest="pic/".$newpic;
               if(!$filestore){
               echo "picture not successfully uploaded".'<br />';//display_success("picture successfully uploaded");
               }
               /*********************************************************************************************/
                $result = mysqli_query($con, "INSERT INTO news(who,title,descp,adates,atimes,ntype,adt,picture) VALUES('$aid','$tit','$desc','$ad','$at','NEWS','$adt','$filest')") or die(display_error("Cannot insert the record into the database"));
               if(!$result)
               {
                die("Can't add record - page expire");
               } else{
                show_success("The News has been created successfully");
               }
               }//end of if(is_uploaded)
			   else{
			   //what if no image was uploaded
								   $result = mysqli_query($con, "INSERT INTO news(who,title,descp,adates,atimes,ntype,adt,picture) VALUES('$aid','$tit','$desc','$ad','$at','NEWS','$adt','')") or die(display_error("Cannot insert the record into the database"));
								   if($result){
									 show_success("The News has been created successfully");
								   }
								   }//end of the else statement that says no image was uploaded
								 }//end of the else statement that checks if all is well
								 }//end of the if statement that checkis if it is a new entry
								 else if($typ == "edit"){
								   //what if we are editing?
								 $tit = mysqli_real_escape_string($con, $_POST['title']);
								 $desc = mysqli_real_escape_string($con, $_POST['desc']);
								 $rec = mysqli_real_escape_string($con, $_POST['rec']);
								 $d=date('Y-m-d');
								 $t=time('h-i-s');
								 //let is do some processing
								 //let us check if the required fields are empty
								  if($tit == "" || $desc == ""){
									 display_error("All fields are required please");
								   }
								   else{
									 //all is now well
									  /****************************************************************************************/
               if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
			   $p = $_FILES['pic']['type'];
			   $pi = explode("/",$p);
			   if ($pi[0] != "image") {
			   display_error("The file you want to upload can only be an image. To correct this please try to Edit the record");
			   }
			   $uiname = basename($_FILES['pic']['name']); // true name of image
               // copy the temp document to the place for storage
               move_uploaded_file($_FILES['pic']['tmp_name'], $target . "/" .$uiname);
               //prepare document for database
               // prepare new name for picture
               $newpic = $uiname;
               $filestore = $target ."/".$newpic;
               $filest="pic/".$newpic;
               if(!$filestore){
               echo "picture not successfully uploaded".'<br />';//display_success("picture successfully uploaded");
               }
               /*********************************************************************************************/
                $result = mysqli_query($con, "UPDATE news SET title='$tit',descp='$desc',picture='$filest' WHERE rec_id='$rec'") or die(display_error("Cannot update the record to the database"));
               if(!$result)
               {
                die("Can't add record - page expire");
               } else{
                show_success("The News has been updated successfully");
               }
               }//end of if(is_uploaded)
			   else{
			   //what if no image was uploaded
									   $result = mysqli_query($con, "UPDATE news SET title='$tit',descp='$desc' WHERE rec_id='$rec'") or die(display_error("Cannot update the record to the database"));
									   if($result){
										 show_success("The News has been updated successfully");
									   }//end of the if statement that says the entry was successfull
									  }//end of the else statement that says no image was uploaded
								   }//end of the else statement that says all is well
								 }//end of the else statement that checks if we are actually editing
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