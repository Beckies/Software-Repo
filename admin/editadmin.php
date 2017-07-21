<?php
session_name("Admin");
session_start(); //Start the current session
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YESS"){
  //echo "Sorry, You are not logged in. Please log in to be able to view this page";
  include_once('../pages/login.php');
  exit;
}
$mytitle = ":: ADMIN";
$id = $_GET['id'];
include_once('../pages/admin_header.php');
$row = $ezzzy->getrow("rec_id",$id,"login_admin");
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
		 <form enctype="multipart/form-data" method="post" action="addadmin_process.php?typ=edit">
                     <input type="hidden" name="rec" value="<?php echo $id; ?>" />
                     <input type="text" value="<?php echo $row['name']; ?>" name="name" placeholder="Admin Name" class="input4">
                        <input type="phone" value="<?php echo $row['phone']; ?>" name="phone" placeholder="Admin Phone number" class="input4">
                        <input type="email" value="<?php echo $row['email']; ?>" name="email" placeholder="Admin E-mail" class="input4">
                        <input type="text" value="<?php echo $row['username']; ?>" name="user" placeholder="Admin Username" class="input4">
                        <input type="password" value="" name="pass" placeholder="Admin Password" class="input4">
                        <input type="password" value="" name="cpass" placeholder="Confirm Password" class="input4">
                        <input type="file" value="" name="pic" placeholder="Upload Photot" class="input4">
			<div class="row clearfix f-space20"></div>
                        <button type="submit" class="btn small color1">Add Admin</button>
						</form>
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