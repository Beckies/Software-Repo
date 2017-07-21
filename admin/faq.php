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
$typ = $_GET['typ'];
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
        <h2>SHOWING NEWS - </h2>
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
                           if(isset($_POST['neww'])){
                             $que = $_POST['name'];
                             $ans = $_POST['note'];
                             //let us do some server processing
                             if($que == "" || $ans == ""){
                               display_error('All fields with * are required');
                             }
                             else{
                               //all is well\
                                         // CHECK FOR DUPLICATE username
                                               $RC = $ezzzy->getallresult("faqs");
                                               while ($mrc = @mysqli_fetch_object($RC)){
                                               // CHECK
                                                  if ($mrc->question == $que) {
                                                     display_error("The FAQ you are trying to add is already existing.");
                                                  }
                                               }//end of the while loop
                                               $result=mysqli_query($con,"INSERT INTO faqs(question,answer) VALUES('$que','$ans')");
                                           if(!$result)
                                               {
                                                die(display_error("Can't add record - page expire"));
                                               }
                                           else{
                                              $mssg = "The FAQ was added successfully.";
                                             }
                                    }//end of the else statement if all s=is well
                           }
                          ?>
							<h4>FAQ</h4>
                            <div><?php if(isset($mssg)) echo $mssg; ?></div>
							  <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								  <input type="text" value="" name="name" placeholder="QUESTION" class="form-control input4" required>
								   <textarea  name="note" placeholder="ANSWER" class="form-control input4" required></textarea>
								   <div class="row clearfix f-space10"></div>
									<button type="submit" value="" name="neww" class="btn small color1">Add</button>
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