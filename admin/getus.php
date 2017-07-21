<?php
session_name("Admin");
session_start(); //Start the current session
include_once('../admin/config.php');
require_once('../functions/sammysql.inc.php');
$ezzzy = new SamMysql($con);
$id = $_SESSION['rec'];
$updateid;
if(isset($_POST['title']))
{

	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die("Oops!! Not an Ajax Request! Talk to ezzzy Pls");
	}

    /**Let us collect the other form data*/
            $tit=mysqli_real_escape_string($con,$_POST['title']);
            $desc=mysqli_real_escape_string($con,$_POST['desc']);
            $pcat=mysqli_real_escape_string($con,$_POST['pcat']);
            $ad=date('Y-m-d');
	    $at=prepdate(time('h-i-s'));
	    $adt=prepdate(time());
            $target="pic";
         //all is well
         /****************************************************************************************/
               if (isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])) {
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
               $newpic = $uiname;
               $filestore = $target ."/".$newpic;
               $filest="pic/".$newpic;
               if(!$filestore){
               echo "picture not successfully uploaded".'<br />';//display_success("picture successfully uploaded");
               }
               /*********************************************************************************************/
                $sql = mysqli_query($con, "INSERT INTO news(postid,who,title,descp,dates,times,adates,atimes,ntype,venue,adt,picture,mediatyp) VALUES('$pcat','$id','$tit','$desc','','','$ad','$at','APP','','$adt','$filest','$p')") or die(mysqli_error($con));
              $qr=mysqli_query($con,$sql) or die('could not perform insertion'.  mysqli_error($con));
              $updateid = mysqli_insert_id($con);

               }//end of if(is_uploaded)
               else{
              $sql = mysqli_query($con, "INSERT INTO news(postid,who,title,descp,dates,times,adates,atimes,ntype,venue,adt,picture,mediatyp) VALUES('$pcat','$id','$tit','$desc','','','$ad','$at','APP','','$adt','$filest','$p')") or die(mysqli_error($con));
              $qr=mysqli_query($con,$sql) or die('could not perform insertion'.  mysqli_error($con));
              $updateid = mysqli_insert_id($con);
              }
              if($qr){
                die('Success!');
                /********************************************************************************************/                
                                    
              /********************************************************************************************/
              }//end of the if statement that says the insert was successfull
              else{
                  echo "not successful";
              }
  }//end of the if statement that checks the uploaded file
else
{
	die('Something wrong with post!');
}
