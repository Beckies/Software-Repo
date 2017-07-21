<?php
$mytitle = " :: WELCOME";
include_once('pages/header.php');
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
        <h2>Privacy Policy</h2>
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
                                        $pag='privacy';
                                        include_once('admin/config.php');
                                        $resultss=mysqli_query($con,"SELECT * FROM siteinfo WHERE page='$pag'") or die(mysqli_error($con));
                                        $rowss=mysqli_fetch_array($resultss);

                                        echo stripslashes($rowss['detail']);

                                  ?>
       <!-- This is the Ending of my manin content -->
    </div>
    <!-- side bar -->
    <?php include_once('pages/rightpanel.php'); ?>
    <!-- end:sidebar -->
  </div>
  <!-- end:row -->
</div>
<!-- end: container-->

<div class="row clearfix f-space30"></div>
<!-- footer -->
<?php include_once('pages/footer.php'); ?>