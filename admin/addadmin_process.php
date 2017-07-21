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
        <h2>ADD ADMIN USER - </h2>
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
								 $name = mysqli_real_escape_string($con, $_POST['name']);
								 $phone = mysqli_real_escape_string($con, $_POST['phone']);
								 $email = mysqli_real_escape_string($con, $_POST['email']);
								 $user = mysqli_real_escape_string($con, $_POST['user']);
								 $pass = mysqli_real_escape_string($con, $_POST['pass']);
								 $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
								 
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($name == "" || $phone =="" || $email == "" || $user == "" || $pass == "" || $cpass == ""){
								   display_error("All fields are required please");
								 }
                                                                 else if($pass != $cpass){
                                                                     display_error("Oops!! The password you supply do not match");
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
                $result = mysqli_query($con, "INSERT INTO login_admin(name,phone,email,username,password,picture)
								   VALUES('$name','$phone','$email','$user','$pass','$filest')") or die(display_error("Cannot insert the record into the database"));
               if($result)
               {
                   $uid = mysqli_insert_id($con);
                   mysqli_query($con,"INSERT INTO userlogins(uid,email,phone,username,password,usertyp) VALUES('$uid','$email','$phone','$user','$pass','ADMIN')") or die("Cannot update to the users table");
                show_success("The Admin user was added successfully");
               }
               }//end of if(is_uploaded)
               else{
								   $result = mysqli_query($con, "INSERT INTO login_admin(name,phone,email,username,password,picture)
								   VALUES('$name','$phone','$email','$user','$pass','')") or die(display_error("Cannot insert the record into the database"));
								   if($result){
                                                                       $uid = mysqli_insert_id($con);
                   mysqli_query($con,"INSERT INTO userlogins(uid,email,phone,username,password,usertyp) VALUES('$uid','$email','$phone','$user','$pass','ADMIN')") or die("Cannot update to the users table");
									 show_success("The admin user was added successfully");
								   }
                                }//end of the else statement that says no image was uploaded
								 }//end of the else statement that checks if all is well
		}//end of the if statement that checkis if it is a new entry
								 else if($typ == "edit"){
								   //what if we are editing?
								 $name = mysqli_real_escape_string($con, $_POST['name']);
								 $phone = mysqli_real_escape_string($con, $_POST['phone']);
								 $email = mysqli_real_escape_string($con, $_POST['email']);
								 $user = mysqli_real_escape_string($con, $_POST['user']);
								 $pass = mysqli_real_escape_string($con, $_POST['pass']);
								 $cpass = mysqli_real_escape_string($con, $_POST['cpass']);
								 $rec = mysqli_real_escape_string($con, $_POST['rec']);
								 //let is do some processing
								 //let us check if the required fields are empty
								 if($name == "" || $phone =="" || $email == "" || $user == "" || $pass == "" || $cpass == ""){
								   display_error("All fields are required please");
								 }
                                                                 else if($pass != $cpass){
                                                                     display_error("Oops!! The password you supply do not match");
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
                $result = mysqli_query($con, "UPDATE login_admin SET name='$name',phone='$phone',email='$email',username='$user',password='$pass',picture='$filest' WHERE rec_id='$rec'") or die(display_error("Cannot update the record to the database"));
               if($result)
               {
                   mysqli_query($con, "UPDATE userlogins SET email='$email',phone='$phone',username='$user',password='$pass' WHERE uid='$rec' and usertyp='ADMIN'") or die("Canoot update the so called admin");
                show_success("The Admin user has been updated successfully");
               }
               }//end of if(is_uploaded)
               else{
								   $result = mysqli_query($con, "UPDATE login_admin SET name='$name',phone='$phone',email='$email',username='$user',password='$pass' WHERE rec_id='$rec'") or die(display_error("Cannot update the record to the database"));
								   if($result){
									mysqli_query($con, "UPDATE userlogins SET email='$email',phone='$phone',username='$user',password='$pass' WHERE uid='$rec' and usertyp='ADMIN'") or die("Canoot update the so called admin");
									 show_success("The detail of the admin user has been updated successfully");
								   }
                                   }//end of the else statement that says there is no image
								   }//end of the else statement that says all os well
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