<?php
$mytitle = "ADEDAMOLA :: FORGOT";
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
        <h2>Forgot Password</h2>
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
                            if (isset($_POST['toad']) && $_POST['toad'] =="add") {
                         // check submitted values
                                if (!empty($_POST['Scode']) && strtolower($_POST['Scode']) == strtolower(@$_SESSION['rcode'])) {

                                    if ($_POST['Email'] =="") {
                                       display_error("You did not supply a valid email address. Please try again");
                                    }
                                     // check if email is correct
                                    if (!trueemail($_POST['Email'])) {
                                        display_error("The email you entered is not valid, Please correct and try again");
                                    }
                                                                 // if no match
                                      $myemail = cleana($_POST['Email']);
                                       if ($ezzzy->getrecords("userlogins","email",$myemail) ==0) {
                                          display_error("Sorry!, The email or username you entered does not exist in our database.");
                                       }
                                       // generate a new passord for this user
                                       $npass = generate_pass();
                                       // encrypt the new password and store in database
                                       $encpass = $npass;// do_crypt($npass);
                                       // add
                                       /***************************************************************/
                                       $mmail = $ezzzy->getrow("email",$myemail,"userlogins");
                                       if($mmail['usertyp'] == "ADMIN"){
                                         $allrec = $ezzzy->getrow("email",$myemail,"login_admin");
                                         $ezzzy->updateval("password",$encpass,"login_admin","email",$myemail);
                                       }
                                       if($mmail['usertyp'] == "MEMBER"){
                                         $allrec = $ezzzy->getrow("email",$myemail,"members");
                                         $ezzzy->updateval("password",$encpass,"members","email",$myemail);
                                       }
                                       /***************************************************************/
                                       $ezzzy->updateval("password",$encpass,"userlogins","email",$myemail);

                                       //echo $npass;
                                       // prepare email
                                       $theTime = gmdate("D, jS M Y h:i A"). " GMT";
                                       $sender = "From: no-reply@adedamolao.com"; //PLEASE CHANGE
                                       $subject = "Your Password has been reset";
                                       $mesbody = " Dear ". $allrec['firstname']." - ".$allrec['lastname']." \n\n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " Someone requested for this password on ". $theTime ."\n";
                                       $mesbody .= " \n";
                                       $mesbody .= " Below are your login details \n\n";
                                       $mesbody .= " Your Username : ". $allrec['username'] . " \n";
                                       $mesbody .= " Your Password : ". $encpass . " \n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " You can now login with this temporary password so that you can then change your password .\n\n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " If you didn't make this request, someone else must have done it.\n\n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " Thank You. \n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " Program Administrator. \n\n";
                                       // send email
                                       if (@mail($allrec['email'],$subject,$mesbody,$sender)) {
                                          $messg = "Your login details has been successfully sent to your email address. <br> Thank you.";
                                          //show_success($mmsg);
                                       }
                                       else {
                                          $messg = "Sorry, your login details could not be sent, there was an error. <br> Please try again later.";
                                          //show_error($messg);
                                       }

                                        //at last destroy the session
                                        unset($_SESSION['rcode']);
                                        // Unset all of the session variables.
                                        $_SESSION = array();
                                        // Finally, destroy the session.
                                        session_destroy();
                                   }
                                   else {
                                       // Security code not correct
                                    $messg = "There is a problem with the <strong>Security Code</strong> you entered. Please close this window and click on the <u>Forgot Password?</u> link again";
                                    //at last destroy the session
                                    unset($_SESSION['rcode']);
                                    // Unset all of the session variables.
                                    $_SESSION = array();
                                    // Finally, destroy the session.
                                    session_destroy();
                                   }
                             }
                          else {
                                     // Display the add new user form
                                 ?>
                                 <?php
                                    if(isset($messg)) ezzzy_msg("Success",$messg.$encpass,"5000");
                                  ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return checka(this)">
                                                  <input type="hidden" name="toad" value="add" />
                                                  <div class="form-group"><label for="Email"> Enter your E-mail address</label><input class="input4 sp form-control" type="text" id="Email" name="Email" placeholder="Enter Your email here" /></div>
                                                 <div class="media"><label for="SC"> Security Code </label> <img src="phprand.php" alt="Security Image" vspace="1" align="top" />  </div>
                                                 <div class="form-group"><label for="Scode"> Enter Security Code </label> <input type="text" name="Scode" id="Scode" class="input4 sp form-control" placeholder="Enter Security Code" /> </div>
                                                <div>&nbsp;</div>
                                                <div><label>&nbsp; </label> <input type="submit" name="Send" value="Send New Password" class="btn small color1" />

                                 <!-- Confirm before submission -->
                                 <script language="JavaScript1.2">

                                             function checka(form)
                                             {
                                             if(form.Email.value=='')
                                                {
                                                   alert('Please Enter your Email address');
                                                   return false;
                                                }
                                             if(form.Scode.value=='')
                                                     {
                                                        alert('Please Enter the correct Security Code');
                                                        form.Scode.focus();
                                                        return false;
                                                     }

                                           form.btnSend.value = "Sending...";
                                           return true;
                                             }

                                           </script>
                                                    </div>
                                                </form>
                <?php
                    }//end of that displays the form in a case when it has not been submitted
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