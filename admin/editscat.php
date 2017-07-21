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
$row = $ezzzy->getrow("rec_id",$id,"scat");
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
        <h2>EDIT SUB CATEGORY - </h2>
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
		 <form enctype="multipart/form-data" method="post" action="cscat_process.php?typ=edit">
                     <input type="hidden" name="rec" value="<?php echo $id; ?>" />
                     <input value="<?php echo $row['title']; ?>" type="text" name="title" placeholder="Category Title" class="input4">						
                         <textarea id="text1" name="desc" cols="90" rows="10" placeholder="Description" class="form-control"><?php echo $row['descp']; ?></textarea>
                        <script language="javascript1.2">
                            generate_wysiwyg('text1');
			</script>						 
			<div class="row clearfix f-space20"></div>
                        <button type="submit" class="btn small color1">Edit</button>
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