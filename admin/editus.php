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
$rw = $ezzzy->getrow("rec_id",$id,"news");
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
        <h2>UPLOAD APP - </h2>
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
       <!-- This is the beginning of my mani content -->
       <form enctype="multipart/form-data" id="MyUploadFormm" method="post" action="us_process.php?typ=edit">
           <input type="hidden" name="rec" value="<?php echo $id; ?>" />
                    <img src="../images/ajax-loader.gif" class="icon-spinner icon-spin" id="loading-img" style="display:none;" alt="Please Wait"/>
                    <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt"></div></div>
                    <div id="output"></div>
                    <label class="small">App/Software Category: </label>
                     <select name="pcat" class="form-control">
                         <option value="<?php echo $rw['postid']; ?>"><?php echo $ezzzy->getval("rec_id",$rw['postid'],"scat","title"); ?></option>
                         <?php
                          $result = $ezzzy->getallresult("scat","title","A");
                          while($row = mysqli_fetch_array($result)){
                              ?>
                         <option value="<?php echo $row['rec_id']; ?>"><?php echo $row['title']; ?></option>                              
                              <?php
                          }
                         ?>
                     </select>
                    <label class="small">App/Software Title: </label>
                    <input type="text" name="title" value="<?php echo $rw['title']; ?>" id="title" placeholder="App Title" class="input4">
                        <label class="small">Description: </label>                        
                        <textarea id="text1" name="desc" id="desc" cols="90" rows="10" placeholder="Description" class="form-control"><?php echo $rw['descp']; ?></textarea>
                        <script language="javascript1.2">
                            generate_wysiwyg('text1');
			</script>
                        <label class="small">Change Cover Photo: <img src="<?php echo $rw['picture']; ?>" style="width: 50px; height: 50px;" /></label>
                        <input type="file" name="pic" id="userImage" title="Browse to upload" class="user-image btn btn-sm btn-info m-b-sm" />
                        <label class="small">Change app/Software: </label>
                        <input type="file" name="app" id="userImage" title="Browse to upload" class="user-image btn btn-sm btn-info m-b-sm" />
									<div class="row clearfix f-space20"></div>
                                                                        <button id="FormSubmitt" name="shareee" type="submit" class="btn small color1">Update</button>
		</form>
       <!-- This is the Ending of my mani content -->
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
<?php include_once('../pages/foot.php');