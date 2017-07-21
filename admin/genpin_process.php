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
        <h2>GENERATE PIN - </h2>
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
               if(isset($_POST['submit'])){
                //
                 if(!isset($_POST['np']) || $_POST['np'] == ""){
                   display_error('You did not specify the number of pins to generate');
                  }
                 //if all is well
                 else{
                   include_once('config.php');
                  $np = $_POST['np'];
                  echo $np ." <br /> code: ";
                  //$sam = generate_code();
                  for($i=0; $i<$np; $i++){
                     $pi[$i] = generate_code();
                     //$si[$i] = generate_pass();
                     // add to database
                          $sql="INSERT INTO pins(pin,status) VALUES('$pi[$i]','UNUSED')";
                          $result=mysqli_query($con,$sql);
                          if(!$result){
                            echo "Cannot add pin to database";
                          }
                          else{
                              show_success("pins successfully added to database");
                          }
                      }//end of for loop
                        //print_r($pi).'<br />';

                   }// end of else statement if all is well

                 }//end of the if statement of a submit button
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