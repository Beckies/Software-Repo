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
if(@$_GET['ctyp'] == "" || !isset($_GET['ctyp'])){
    display_error("There is an error, please try again");
}
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
        <h2>ADD CATEGORY - <?php echo @$_GET['ctyp']; ?></h2>
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
		 <form enctype="multipart/form-data" method="post" action="ccat_process.php?typ=new">
                     <input type="hidden" name="ctyp" value="<?php echo @$_GET['ctyp']; ?>" />
                        <input type="text" value="" name="title" placeholder="Category Title" class="input4">						
                         <textarea id="text1" name="desc" cols="90" rows="10" placeholder="Description" class="form-control"></textarea>
                        <script language="javascript1.2">
                            generate_wysiwyg('text1');
			</script>
						 
									<div class="row clearfix f-space20"></div>
                        <button type="submit" class="btn small color1">Add Category</button>
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