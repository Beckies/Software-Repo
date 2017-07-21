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
            <form enctype="multipart/form-data" method="post" action="addnews_process.php?typ=new">
                        <input type="text" value="" name="title" placeholder="News Title" class="input4">
                        <textarea id="text1" name="desc" cols="" class="form-control" rows="10" placeholder="Description"></textarea>
                        <script language="javascript">
								  generate_wysiwyg('text1');
								</script>
						 	 <div class="col-lg-8 media m-t-none">
									<div class="bg-light pull-left text-center media-lg thumb-lg padder-v">
									<i class="icon-picture inline icon-light icon-2x m-t-lg m-b-lg"><small class="text-muted">Image</small></i>
									</div>
									<div class="media-body">
									<input type="file" name="pic" title="Browse to upload image" class="btn btn-sm btn-info m-b-sm">
									</div>
									</div>
									<div class="row clearfix f-space30"></div><br />
                        <input type="submit" value="Add" class="btn small color1">
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