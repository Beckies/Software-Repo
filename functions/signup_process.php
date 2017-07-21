<?php
$shet = "about";
$mytitle = "TWINSAX :: SIGN-UP";
include_once('admin/config.php');
require_once('functions/ezzzy_function.php');
require_once('functions/sammysql.inc.php');
$ezzzy = new SamMysql($dbC);
include_once('pages/header.php');
?>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div id="content">
      <h1>SIGN-UP </h1>
      <!-- This is the begining my main Content -->
        <?php
             $name=cleana($_POST['name']);
             $sex=$_POST['sex'];
             $country=cleana($_POST['country']);
             $state=cleana($_POST['state']);
             $phone=cleana($_POST['phone']);
             $mail=cleana($_POST['email']);
             $add=cleansp($_POST['add']);
             $dept=$_POST['dep'];
             $dob=$_POST['da']."-".$_POST['mnt']."-".$_POST['yr'];
             $user=cleana($_POST['user']);
             $pass=cleana($_POST['pass']);
             $cpass=cleana($_POST['cpass']);
             $past=$_POST['pst'];
             $bda=$_POST['mnt']."-".$_POST['da'];
             //$picture=$_POST['pic'];
             //let us check for empty fields
             if($name == '' || $phone == '' || $mail == '' || $add == '' || $dob == '' || $user == '' || $pass == '' || $cpass == ''){
               display_error("All fields are required please");
             }
             if(!is_numeric($phone)){
               display_error("Please supply a valid phone number");
             }
             if(!trueemail($mail)){
               display_error("Please supply a valid mail");
             }
             if($cpass != $pass){
               display_error("Your Passwords do no match");
             }
             else{
               //all is well\
               // CHECK FOR DUPLICATE username
                     $RC = $ezzzy->getallresult("userlogins");
                     while ($mrc = @mysql_fetch_object($RC)){
                     // CHECK
                        if ($mrc->username == $user) {
                           display_error("The username you supplied already exist. A unique username is required per applicant.");
                        }
                        if ($mrc->email == $mail) {
                           display_error("The email you supplied already exist. A unique email is required per applicant.");
                        }
                     }//end of the while loop
               $target="admin/pic";

               /****************************************************************************************/
               if (is_uploaded_file($_FILES['pic']['tmp_name'])) {
			   $p = $_FILES['pic']['type'];
			   $pi = explode("/",$p);
			   if ($pi[0] != "image") {
			   display_error("The file you want to upload can only be an image. To correct this please try to Edit the record");
			   }
			   $uiname = basename($_FILES['pic']['name']); // true name of image
               // copy the temp document to the place for storage
               move_uploaded_file($_FILES['pic']['tmp_name'], $target . "/" .$uiname);
               //prepare document for database
               // prepare new name for picture
               $newpic = renamefile($uiname,$pi[1]);
               $filestore = $target ."/".$uiname;
               $filest="pic/".$uiname;
               if(!$filestore){
               echo "picture not successfully uploaded".'<br />';//display_success("picture successfully uploaded");
               }
               /*********************************************************************************************/
                $result=mysql_query("INSERT INTO members(name,sex,country,state,phone,email,address,dob,bd,dept,username,password,picture,mtyp) VALUES('$name','$sex','$country','$state','$phone','$mail','$add','$dob','$bda','$dept','$user','$pass','$filest','$past')");
               if(!$result)
               {
                die("Can't add record - page expire");
               } else{
                 $meid=mysql_insert_id();
                 mysql_query("INSERT INTO userlogins(uid,email,phone,username,password,usertyp) VALUES('$meid','$mail','$phone','$user','$pass','MEMBER')") or die("Cannot add to the user table");
                show_success("Details has been Sucessessfully added to the database!!!");
               }
               }//end of if(is_uploaded)
               else{
                 $result=mysql_query("INSERT INTO members(name,sex,country,state,phone,email,address,dob,bd,dept,username,password,picture,mtyp) VALUES('$name','$sex','$country','$state','$phone','$mail','$add','$dob','$bda','$dept','$user','$pass','$filest','$past')");
               if(!$result)
               {
                die("Can't add record - page expire");
               } else{
                 $meid=mysql_insert_id();
                 mysql_query("INSERT INTO userlogins(uid,email,phone,username,password,usertyp) VALUES('$meid','$mail','$phone','$user','$pass','MEMBER')") or die("Cannot add to the user table");
                show_success("Details has been Sucessessfully added to the database!!!");
               }
               }
             }//end of the else statement if all s=is well
            ?>
      <!-- This is the ending my main Content -->
    </div>
    <?php include_once('pages/right.php'); ?>
    <!-- ####################################################################################################### -->
  </div>
</div>
<!-- ####################################################################################################### -->
<?php include_once('pages/footer.php'); ?>