<?php
$mytitle = " :: WELCOME";
include_once('pages/header.php');
if (isset($_POST['Signup']))
			{
			  /****************************************************************/
			  //$referer=0;
			  //let us know if this person was refered by someone
              if(isset($_GET['bisi']) && $_GET['bisi'] != 0){
                $referer = $_GET['bisi'];
                $referer = $_POST['bisi'];
              }
              /****************************************************************/
              //let us get the form variables
					//$student_id = mysqli_real_escape_string($con, $_POST['student_id']);
					$fname = mysqli_real_escape_string($con, $_POST['fname']);
					$lname = mysqli_real_escape_string($con, $_POST['lname']);
					//$nickname = mysqli_real_escape_string($con, $_POST['nickname']);
					$email = mysqli_real_escape_string($con, $_POST['email']);
					$phone = mysqli_real_escape_string($con, $_POST['phone']);
					$dob=$_POST['yr']."-".$_POST['mnt']."-".$_POST['da'];
					$pass = mysqli_real_escape_string($con, $_POST['pass']);
					//$cpass = mysqli_real_escape_string($con, $_POST['cpass']);
					$sex = mysqli_real_escape_string($con, $_POST['sex']);
                    @$referer = $_GET['bisi'];
                    @$referer = $_POST['bisi'];
					//let us do some validation
				if($fname == "" || $lname == "" || $email == "" || $pass == "" || $dob == "" || $sex == "" || $phone == ""){
				 display_error("All Fields are required please");
				}
				/*else if($pass != $cpass){
				 display_error('Your passwords do not match');
				}*/
				else if(!is_numeric($phone)){
				 display_error('Please supply a valid phone number');
				}
				else if(!trueemail($email)){
				  display_error('Please supply a valid email');
				}
				else{
				//all is well
				// CHECK FOR DUPLICATE phone and email
                     $RC = $ezzzy->getallresult('userlogins');
                     while ($mrc = mysqli_fetch_array($RC)){
                     // CHECK
                        if ($mrc['phone'] == $phone) {
                           display_error("The Phone number you supplied already exist. A phone Number is required is required per applicant.");
                        }
                        if ($mrc['email'] == $email) {
                           display_error("The email you supplied already exist. A unique email is required per applicant.");
                        }
                     }//end of the while loop
					 $n = 0;
					 $acode=generate_code();
					 $field = "password,,firstname,,lastname,,phone,,email,,birthdate,,gender,,status,,acode,,referer";
					 $vals = "'$pass',,'$fname',,'$lname',,'$phone',,'$email',,'$dob',,'$sex',,'ACTIVE',,'$acode',,'$referer'";
					 $result = $ezzzy->addlist($field,$vals,"members",$n);
					 //$result = mysqli_query($con,"INSERT INTO members(password,firstname,lastname,phone,email,birthdate,gender) VALUES('$pass','$fname','$lname','$phone','$email','$dob','$sex')") or die("Cannot insert into the user table");
					 if($result){
					   $uid = mysqli_insert_id($con);
                     $user = "$".$fname.".".$lname.$uid;
                     mysqli_query($con,"UPDATE members set username='$user' WHERE member_id='$uid'") or die("Cannot insert the username");
					 $field1 = "uid,,email,,phone,,username,,password,,usertyp";
					 $vals1 = "'$uid',,'$email',,'$phone',,'$email',,'$pass',,'MEMBER'";
					 $ezzzy->addlist($field1,$vals1,"userlogins",$n);
			/********************************************************************************/
					   // 1. et us send his activation code by bulk sms
                       $rst=mysqli_query($con,"SELECT * FROM login_admin WHERE rec_id='1'") or die("Cannot Perform query");
                        $rwr=mysqli_fetch_array($rst);
                        $su=$rwr['smsuser'];
                        $sp=$rwr['smspass'];
                        if($su == '' || $sp == ''){
                          //display_error("Sorry!!! You cannot send SMS now as you have not define the username and password for your SMS gateway");
                        }
					   $sender="CLoaded";
					   $sms_username=$su;
                      $sms_password=$sp;
                      $mty="0";
                      $msgg = "Hello".$fname."find your activation code for Adedamolao:".$acode." Thanks, Adedamolao Team";
					   $phoe=addctcode($phone,"234");
                       //$result=SendMSG($sms_username,$sms_password,$sender,$msgg,$mty,$phoe);
                      //2.  let us send the activation code by email
                      $clemail= $_POST['email'];
                     $mysubject = "You have successfully Created your Account";
                     $mybody = "\n";
                     $mybody .= "Dear " . $fname ."\n\n";
                     $mybody .= "We want to thank you for confirming your membership with Adedamolao. \n";
                     $mybody .= "You have successfully created your account. Below is your login details: \n\n";
                     $mybody .= "Username: ". $email . " \n";
                     $mybody .= "Password: ". $_POST['pass'] . "\n\n";                     
                     $mybody .= " \n\n";
                     $mybody .= " You can now login to continue roaming on our webapp. \n\n";
                     $mybody .= " \n\n";
                     $mybody .= "Thank you.";
                     $mybody .= "\n\n";
                     $mybody .= "Adedamolao Team.\n\n";
                     $hedder = "From: no-reply@adedamolao.com \n\n";

                     // send mail  to new member
                     if (!@mail($clemail,$mysubject,$mybody,$hedder)) {
                         $message = '<br />'."Sorry, $fname , we could not email your login details. There may be a problem with your email address";
                     }
                     else{
                         $message = '<br />'."Thank you, $fname , Your login details has been sent to your email box.";
                     }
            /********************************************************************************/
					  $msg = "Success";
					 }
				}//end of the else statement that checks if all is well
			}//end of the if statement that checks if we are registering
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
        <h2>Join</h2>
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
          if(isset($_GET['bisi']) && $_GET['bisi'] != 0){echo "REFERER: ".$ezzzy->getval("member_id",$_GET['bisi'],"members","firstname");}
            if(isset($_GET['msg'])){ ezzzy_msg("Message!!",$_GET['msg'],"3000"); }
            if(isset($msg)){ ezzzy_msg("Success","Your account Was created Successfully. You can now continue to roam with Adedamola","7000"); 
            }
            if(isset($messg)){ ezzzy_msg("Success",@$messg,"5000"); }
          ?>            
	  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="hidden" value="<?php echo @$_GET['bisi']; ?>" name="bisi" />
	  <label class="small">Firstname</label>
		  <input type="text" value="" name="fname"  placeholder="Firstname" class="input4 sp form-control" required />
		  <label class="small">Lastname</label>
          <input type="text" value="" name="lname"  placeholder="Lastname" class="input4 sp form-control" required />
		  <label class="small">Phone Number</label>
		  <input type="tel" value="" name="phone" placeholder="Phone Number" class="input4 sp form-control" required />
		  <label class="small">E-mail</label>
		   <input type="email" value="" name="email" placeholder="E-mail" class="input4 sp form-control" required />
		   <label class="small">Password</label>
          <input type="password" name="pass" value=""  placeholder="Password" class="input4 sp form-control" required />
          <input type="radio" class="radio-inline" name="sex" value="Male" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Male</span>
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" class="radio-inline" name="sex" value="Female">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Female</span>
		  <span><br />Date Of Birth:</span><div class="row clearfix f-space10"></div><?php echo selectdate('yr','mnt','da','','','','round'); ?>
		  <br />
			<div class="checkbox">
                            &nbsp;&nbsp;&nbsp;<input name="agree" type="checkbox" required /> Agree to the <a style="color: red;" data-toggle="modal" data-target="#myModal">Terms &amp; Conditions</a>
			</div>
          <button type="submit" name="Signup" class="btn input-sm color1 pull-right" />Create New Account</button>
          <!--button class="btn large color2 pull-right">Submit</button-->
        </form><br /><br />
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