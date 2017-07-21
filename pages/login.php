<?php
// Begin Session
@session_name("Mycode");
//begin session
@session_start();
//include all necessary files
require_once("../functions/ezzzy_function.php");
include_once('../admin/config.php');
require_once("../functions/sammysql.inc.php");
// Initialize our class
$ezzzy = new SamMysql($con);
?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="First online campus social system" name="description">
<meta content="adedamolao.com" name="author">
<link href="../images/ico.html" rel="shortcut icon">
<title>Adedamolao</title>
<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="../css/custom.css" rel="stylesheet" type="text/css" />
<!-- Color -->
<link href="../css/skin/color.css" id="colorstyle" rel="stylesheet">
<script src="../todo/css/app.v1.js"></script>
<!-- Custom Scripts -->
<script src="../js/scripts.js"></script>
</head>
<body>
<!-- Header -->
<header>
   <div class="f-space20"></div>
<!--  <div class="container">
    <div class="row clearfix">
      <div class="col-lg-3 col-xs-12">
        <span class="navbar-brand" href="#"><img src="../images/logo.png"></span>
      </div>
      <div class="visible-xs f-space20"></div>
     </div>
  </div>-->
  </header>
<!-- end: Header -->
<div class="row clearfix f-space10"></div>

<div class="container">
  <!-- row -->
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 main-column box-block">
      <div class="box-content checkout-op">
        <div class="panel-group" id="checkout-options">
          <!-- login and register panel -->
          <div class="panel panel-default">
            <div class="panel-heading opened" data-parent="#checkout-options" data-target="#op1" data-toggle="collapse">
              <h4 class="panel-title"> <a href="#a"> <span></span> Login Options </a> </h4>
            </div>
            <div class="panel-collapse collapse in" id="op1">
              <div class="panel-body">
                <div class="row co-row">
                  <!-- Login -->
                  <div class="col-md-4 col-xs-12">
                  </div>
                  <!-- end: Login -->
                  <div class="col-md-4 col-xs-12">
                    <div class="box-content login-box">
                      <h4>Please Log in With your credentials</h4>
					  <p style="color: red;"><?php if(@$_GET['msg'] != null) echo @$_GET['msg']; ?></p>
                      <form action="../admin/check_login.php" method="post">
                        <input type="text" value="" name="username" placeholder="Email/Username" class="input4" required />
                        <input type="password" value="" name="password" placeholder="Password" class="input4" required />
						<br />
							<input name="agree" type="checkbox" class="pull-left"/><br /><span class="pull-left">Remember Me</span>
							<button class="btn small color1 pull-right" type="submit" name="login">Sign in</button>
							<br />
						  <span class="fp-link"><a href="#a" class="color2" data-toggle="modal" data-target="#forgotpass">Forgot password?</a></span>


                      </form>
					  </div>
					  </div>
                  <!-- End of Login -->
                  <div class="col-md-4 col-xs-12">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Forgot Password Page -->
  <div id="forgotpass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
        </div>
        <div class="modal-body feature-box">
        <!-- Beginning of my main content -->
            <?php
                            if (isset($_POST['toad']) && $_POST['toad'] =="add") {
                         // check submitted values
                                if (!empty($_POST['Scode']) && strtolower($_POST['Scode']) == strtolower($_SESSION['rcode'])) {

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
                                       /*else{
                                         $te=mysql_query("SELECT * FROM userlogins WHERE email='$myemail'") or die("Cannot fetch the emails");
                                         $tee=mysql_fetch_array($te);
                                         $mmail=$tee['email'];
                                       } */
                                       // generate a new passord for this user
                                       $npass = generate_pass();
                                       // encrypt the new password and store in database
                                       $encpass = do_crypt($npass);
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
                                       $sender = "From: donotreply@adedamolao.com"; //PLEASE CHANGE
                                       $subject = "Your Password has been reset";
                                       $mesbody = " Dear ". $allrec['firstname']." - ".$allrec['lastname']." \n\n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " Someone requested for this password on ". $theTime ."\n";
                                       $mesbody .= " \n";
                                       $mesbody .= " Below are your login details \n\n";
                                       $mesbody .= " Your Username : ". $allrec['username'] . " \n";
                                       $mesbody .= " Your Password : ". $npass . " \n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " You can now login with this temporary password so that you can then change your password .\n\n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " If you didn't make this request, someone else must have done it.\n\n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " Thank You. \n";
                                       $mesbody .= " \n\n";
                                       $mesbody .= " Program Administrator. \n\n";
                                       // send email
                                       if (mail($allrec['email'],$subject,$mesbody,$sender)) {
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
                                    show_error("There is a problem with the <strong>Security Code</strong> you entered. Please close this window and click on the <u>Forgot Password?</u> link again");
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
                                 <p><?php if(isset($messg)) echo $messg; ?></p>
<!--            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return checka(this)">
                                                  <input type="hidden" name="toad" value="add" />
												  <div class="form-group"><label for="Email"> Enter your E-mail address</label><input type="text" id="Email" name="Email" class="input-sm form-control" /></div>
                                                 <div class="media"><label for="SC"> Security Code </label> <img src="../phprand.php" alt="Security Image" vspace="1" align="top" />  </div>
                                                <div class="form-group"><label for="Scode"> Enter Security Code </label> <input type="text" name="Scode" id="Scode" class="input-sm form-control" onMouseover="showhint('Please Enter the <b><u> Security Code</u></b> as shown above.', this, event, '250px')" /> </div>
                                                <div>&nbsp;</div>
                                                <div><label>&nbsp; </label> <input type="submit" name="Send" value="Send New Password" class="btn small color1" />

                                 
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
                                                </form>-->
                <?php
                    }//end of that displays the form in a case when it has not been submitted
                ?>
            <!-- Ending of my main Content -->
        </div>
      </div>
	  	<div class="row clearfix f-space30"></div>
	<div class="row clearfix f-space30"></div>
	<div class="row clearfix f-space30"></div>
	<div class="row clearfix f-space30"></div>
	<div class="row clearfix f-space30"></div>
    </div>
  </div>
<?php
include_once('../pages/foot.php');
?>