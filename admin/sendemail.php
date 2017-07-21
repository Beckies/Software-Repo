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
		 <form enctype="multipart/form-data" method="post" action="sendemail_process.php?typ=mass">
                     <label>To: </label>
                        <select name="to" id="to_isEmpty" class="input4">
                            <option value="">Select Recipient(s)</option>
                            <option value="ALL MEMBERS">ALL MEMBERS</option>
                            <option value="ADMIN">ALL ADMIN USERS</option>                            
                          </select>
                     <label>Subject: </label>
                     <input type="text" name="sub" id="sub_isEmpty" value="" class="input4" />
                     <label>Message: </label>
                     <textarea name="msg" id="msg_isEmpty" value="" class="input4"></textarea>
                     <input type="submit" class="btn small color1" name="submit" value="Send">
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