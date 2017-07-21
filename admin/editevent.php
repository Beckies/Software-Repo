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
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM news WHERE rec_id ='$id'") or die("Cannot get the required details");
$row = mysqli_fetch_array($result);
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
        <h2>EDIT EVENTS - </h2>
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
            <form enctype="multipart/form-data" method="post" action="./?ezzzy=addevents_process&typ=edit">
							  <input type="hidden" name="rec" value="<?php echo $row['rec_id']; ?>" />
							  <input type="text" value="<?php echo $row['title']; ?>" name="title" placeholder="Title" class="input4" required>
							  <input type="text" value="<?php echo $row['venue']; ?>" name="venue" placeholder="Venue" class="input4">
							  <textarea id="text1" name="desc" cols="90" value="" rows="10" placeholder="Description"><?php echo $row['descp']; ?></textarea>
                              <script language="javascript">
								  generate_wysiwyg('text1');
								</script>
							  <br />
                              <div class="form-group m-t-lg">
									<div class="col-sm-8 media m-t-none">
									<div class="media-body">
									<input type="file" name="pic" title="Upload pics" class="btn btn-sm btn-info m-b-sm"><br>
									</div>
									</div>
									</div><br /><br />
  							<button type="submit" value="" name="edit" class="btn small color1">Update</button>
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