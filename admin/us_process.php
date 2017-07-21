<?php
session_name("Admin");
session_start(); //Start the current session
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YESS"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../pages/login.php');
  exit;
}
$mytitle = ":: ADMIN";
$id = $_SESSION['rec'];
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
        <h2>UPLOAD SOFTWARE - </h2>
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
								 //let us get the parsed variables
								 if($typ == "new"){
								 $tit=mysqli_real_escape_string($con,$_POST['title']);
                                                                $desc=mysqli_real_escape_string($con,$_POST['desc']);
                                                                $pcat=mysqli_real_escape_string($con,$_POST['pcat']);
                                                                $ad=date('Y-m-d');
                                                                $at=prepdate(time('h-i-s'));
                                                                $adt=prepdate(time());
								 
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($tit == "" || $desc =="" || $pcat == "" ){
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
               /*********************************************************************************************/
               $q = $_FILES['app']['type'];
			   $qi = explode("/",$q);
			   if ($qi[0] != "application") {
			   display_error("The file you want to upload can only be an application. To correct this please try to Edit the record");
			   }
			   $uiname1 = basename($_FILES['app']['name']); // true name of image
               // copy the temp document to the place for storage
               move_uploaded_file($_FILES['app']['tmp_name'], $target . "/" .$uiname1);
               //prepare document for database
               // prepare new name for picture
               $newpic1 = $uiname1;
               $filestore = $target ."/".$newpic1;
               $filest1="pic/".$newpic1;
               /*-------------------------------------------------------------------------------------------*/
                $result = mysqli_query($con, "INSERT INTO news(postid,who,title,descp,dates,times,adates,atimes,ntype,venue,adt,picture,apath,mediatyp) VALUES('$pcat','$id','$tit','$desc','','','$ad','$at','APP','','$adt','$filest','$filest1','$p')") or die(mysqli_error($con));
               if($result)
               {                   
                show_success("The app has been successfully uploaded");
               }
               }//end of if(is_uploaded)
               
               else{
								   $result = mysqli_query($con, "INSERT INTO news(postid,who,title,descp,dates,times,adates,atimes,ntype,venue,adt,picture,mediatyp) VALUES('$pcat','$id','$tit','$desc','','','$ad','$at','APP','','$adt','$filest','$p')") or die(mysqli_error($con));
								   if($result){
                                                                       
									 show_success("The app has been successfully uploaded");
								   }
                                }//end of the else statement that says no image was uploaded
								 }//end of the else statement that checks if all is well
		}//end of the if statement that checkis if it is a new entry
								 else if($typ == "edit"){
								 $tit=mysqli_real_escape_string($con,$_POST['title']);
                                                                $desc=mysqli_real_escape_string($con,$_POST['desc']);
                                                                $pcat=mysqli_real_escape_string($con,$_POST['pcat']);
                                                                $rec=mysqli_real_escape_string($con,$_POST['rec']);
                                                                $ad=date('Y-m-d');
                                                                $at=prepdate(time('h-i-s'));
                                                                $adt=prepdate(time());
								 
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($tit == "" || $desc =="" || $pcat == "" ){
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
               /*********************************************************************************************/
               $q = $_FILES['app']['type'];
			   $qi = explode("/",$q);
			   if ($qi[0] != "application") {
			   display_error("The file you want to upload can only be an application. To correct this please try to Edit the record");
			   }
			   $uiname1 = basename($_FILES['app']['name']); // true name of image
               // copy the temp document to the place for storage
               move_uploaded_file($_FILES['app']['tmp_name'], $target . "/" .$uiname1);
               //prepare document for database
               // prepare new name for picture
               $newpic1 = $uiname1;
               $filestore = $target ."/".$newpic1;
               $filest1="pic/".$newpic1;
               /*-------------------------------------------------------------------------------------------*/
                $result = mysqli_query($con, "UPDATE news SET postid='$pcat',title='$tit',descp='$desc',picture='$filest',apath='$filest1',mediatyp='$p'") or die(mysqli_error($con));
               if($result)
               {                   
                show_success("The app has been successfully updated");
               }
               }//end of if(is_uploaded)
               
               else{
								   $result = mysqli_query($con, "UPDATE news SET postid='$pcat',title='$tit',descp='$desc',mediatyp='$p'") or die(mysqli_error($con));
								   if($result){
                                                                       
									 show_success("The app has been successfully updated");
								   }
                                }//end of the else statement that says no image was uploaded
								 }//end of the else statement that checks if all is well
		}//end of the if statement that checks if we are actually editting
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