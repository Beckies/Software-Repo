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
           <?php
								$do = cleana($_GET['do']);
            @$page=$_POST['pagg'];//"about";
            $detail=mysqli_real_escape_string($con,$_POST['parag1']);
            $id;
            if(isset($_POST['ID'])){
            $id=$_POST['ID'];
              }
            if($detail == ''){
                      display_error("Please type or copy and paste the information for this page");
                    }//end of if all is not well check
                    else{
                      //if all is well
         	switch ($do) {
         		case "new":

                $sql="INSERT INTO siteinfo(page,detail) VALUES('$page','$detail')";
                $result=mysqli_query($con,$sql) or die('could not perform insertion');
                if($result){
                  echo "Page successfully updated";
                }
                else{
                  echo "Can't update page";
                }
                break;//end of the break statement for case new

                //if the form is displayed for editting
                case "edit":
                $sql="UPDATE siteinfo SET detail='$detail' WHERE rec_id='$id'";
                $result=mysqli_query($con,$sql) or die('could not perform update');
                if($result){
                  echo "Page successfully updated";
                }
                else{
                  echo "Can't update page";
                }
                break;//end of the break statement for case edit
                  }//end of the switch case of 'do'
                } //end of the else statement if all is well
								?>
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