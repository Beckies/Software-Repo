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
        <h2>ADD EVENT - </h2>
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
            // let us get today's date and display on the date section
            $ptime = prepdate(time());
            $pt = formDate($ptime);
           ?>
					 <form enctype="multipart/form-data" method="post" action="addevent_process.php?typ=new">
                        <input type="text" value="" name="title" placeholder="Event Title" class="input4">
						<?php echo selectdate('yr','mnt','da'); ?><br />
						<?php selecttime("hr","mn",$pt[3],$pt[4],"sel",'input4'); ?>
                         <textarea id="text1" name="desc" cols="90" rows="10" placeholder="Description" class="form-control"></textarea>
                         <script language="javascript1.2">
								  generate_wysiwyg('text1');
								</script>
						 <input type="text" value="" name="venue" placeholder="Venue" class="input4">
						 	 <div class="col-lg-8 media m-tadd_event.php-none">
									<div class="bg-light pull-left text-center media-lg thumb-lg padder-v">
									<i class="icon-picture inline icon-light icon-2x m-t-lg m-b-lg"><small class="text-muted">Image</small></i>
									</div>
									<div class="media-body">
									<input type="file" name="pic" title="Change" class="btn btn-sm btn-info m-b-sm">
									</div>
									</div>
									<div class="row clearfix f-space20"></div>
                        <button type="submit" class="btn small color1">Add Event</button>
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