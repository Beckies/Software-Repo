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
?>      <!-- end: Quick Help -->

    </div>
  </div>
</div>
<div class="row clearfix f-space10"></div>
<!-- Page title -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="page-title">
        <h2>SITE INFORMATION</h2>
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
            <form  method="post" action="siteinfo_process.php?typ=new">
            <p>Choose a page to edit: </p>
								  <select name="pagee" id="pagee">
                                    <option value="">Select page</option>
                                    <option value="home">Home page</option>
                                    <option value="about">About us</option>
                                    <option value="privacy">Privacy</option>
                                    <option value="termsuse">Terms of Use</option>
                                    <option value="ceo">About the Founders</option>
                                    <option value="contact">Contact Address</option>
                                    <option value="privacy">Privacy Policy</option>
                                    <option value="terms">Terms of Use</option>
                                    <option value="members">Members page</option>
                                </select>
								  <input type="hidden" name="sub" id="sub" value="1" />
                                  <button type="submit" class="btn small color1" name="submit" id="submit" value="">Edit </button>
								   <div class="row clearfix f-space10"></div>
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