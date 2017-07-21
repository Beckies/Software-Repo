<?php
session_name("Members");
session_start(); //Start the current session
$sid = $_SESSION['stdid'];
include_once('../admin/config.php');
require_once('../functions/sammysql.inc.php');
$ezzzy = new SamMysql($con);
$id = $_SESSION['stdid'];
$updateid;
if(isset($_POST['themind']))
{

	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die("Oops!! Not an Ajax Request! Talk to ezzzy Pls");
	}

    /**Let us collect the other form data*/
            $post=mysqli_real_escape_string($con,$_POST['themind']);
            $target="upload/uploads";
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
               $filest="upload/uploads/".$newpic;
               if(!$filestore){
               echo "picture not successfully uploaded".'<br />';//display_success("picture successfully uploaded");
               }
               /*********************************************************************************************/
                $sql="INSERT INTO posts(member_id,actualpost,dates,post_to,picture) VALUES ('$id','$post',NOW(),'$id','$filest')";
              $qr=mysqli_query($con,$sql) or die('could not perform insertion'.  mysqli_error($con));
              $updateid = mysqli_insert_id($con);

               }//end of if(is_uploaded)
               else{
              $sql="INSERT INTO posts(member_id,actualpost,dates,post_to,picture) VALUES ('$id','$post',NOW(),'$id','')";
              $qr=mysqli_query($con,$sql) or die('could not perform insertion'.  mysqli_error($con));
              $updateid = mysqli_insert_id($con);
              }
              if($qr){
                //die('Success!');
                /********************************************************************************************/
                ?>

                         <?php
                                        //$poster = mysqli_query($con, "SELECT * FROM posts WHERE member_id = '$member_id' ORDER by dates DESC")or die(mysqli_error($con)); // we will use this wen we start dealing with friends
                                        $poster = mysqli_query($con, "SELECT * FROM posts ORDER by dates DESC")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($poster))
										{
												$id = $row['member_id'];
                                                //let us get the images of the person
                                /****************************************************************************************************/
                                    $imggg = $ezzzy->showpic("member_id",$id,"PROFILE");
                                /****************************************************************************************************/
												$postid = $row['rec_id'];
										    //let us get the user info from his membership details
											$ezzzy = new SamMysql($con);
											$rows = $ezzzy->getrow("member_id",$id,"members");
											$allcount = $ezzzy->getrecords("postcomments","postid",$postid);
											$allcountlike = $ezzzy->getrecords("postlike","postid",$postid);
							?>
                                    <div class="col-lg-6 col-sm-6"> 
                                        <section class="panel"> 
                                            <div class="panel-body"> 
                                                <div class="clearfix m-b"> 
												<?php                                                                                
													$mtime=date("c", strtotime($row['dates']));
												?>
                                                    <small class="text-muted pull-right"><a class="timeago" title="<?php echo $mtime; ?>"></a></small> 
                                                    <a href="#" class="thumb-sm pull-left m-r"> 
                                                        <img src="<?php echo $imggg; ?>" class="img-circle"> 
                                                    </a> 
                                                    <div class="clear"> 
                                                        <a href="./?lnk=profile&id=<?php echo $id; ?>"><strong><?php echo $rows['firstname'];?></strong></a>
                                                        <small class="block text-muted"><!--Nigeria, Osun--></small> 
                                                    </div>
                                                    <?php                                                        
                                                    if($row['picture'] != ""){
                                                    ?>
                                                    <div class="img"><img class="img" width="300" height="243" src="<?php if(!file_exists($row['picture'])){echo "../images/logo1.jpg";} else{ echo $row['picture'];} ?>" /></div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div> 
                                                
                                                <input type='hidden' value='<?php echo $row['rec_id'];?>' name='cantseeme'/>
                                                <p> <?php echo $row['actualpost']; ?> </p>
                                                
                                                <?php
                                             //let us check if the post has been liked
                                             //so that we can display the appropriate like or unlike
                                             $thel = mysqli_query($con,"SELECT * FROM postlike WHERE postid='$postid' AND memberid='$id'") or die("Cannot check if the post has been liked or not");
                                             if(mysqli_fetch_array($thel) == 0){
                                            ?>
                                            <span style="cursor: pointer;" id="thek<?php echo $row['rec_id']; ?>" onclick="<?php echo 'DoLike('.$row['rec_id'].')'; ?>" value="<?php echo $row['rec_id'];?>">(<?php echo $allcountlike; ?>)<i class="icon-heart text-success"></i><!--Kiss--></span>
                                            <?php
                                             }//end of the if statement that checks if the post has not been liked
                                             //what if it has been liked, we are going to display the unlike link
                                             else{
                                            ?>
                                            <span style="cursor: pointer;" id="thek<?php echo $row['rec_id']; ?>" onclick="<?php echo 'DoLike('.$row['rec_id'].')'; ?>" value="<?php echo $row['rec_id'];?>">(<?php echo $allcountlike; ?>)<i class="icon-heart-empty text-danger"></i><!--Unlike--></span>
                                             <?php
                                              }//end of the else statement that checks if the post has not been liked
                                             ?>
                                                <small class=""> <a href="./?lnk=post_det&amp;id=<?php echo $row['rec_id']; ?>"><i class="icon-comment-alt"></i> <!--Comments--> (<?php echo $allcount;?>)</a> </small> 
                                                <?php
													if ($row['member_id'] == $_SESSION['stdid'])
													{
														echo '
														<small class=""><a onclick="return confirm(sure to delete?);" href="./?lnk=home&id='.$row["rec_id"].'&amp;act=delpost"><i class="icon-remove-circle"></i>Delete</a> </small>';
													}
													else
													{
														echo '
														<small class=""> <a href="./?lnk=post_det&amp;id='.$row['rec_id'].'"><i class="icon-comment-alt"></i>Report</a> </small>
														';
													}
												?>
                                            </div> 
                                            <footer class="panel-footer pos-rlt"> <span class="arrow top"></span>                                                 
                                                <form class="pull-out"> 
                                                    <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> 
                                                </form> 
                                            </footer> 
                                        </section> 
                                    </div>
                                    <?php
                                     }
                                    
              /********************************************************************************************/
              }//end of the if statement that says the insert was successfull
  }//end of the if statement that checks the uploaded file
else
{
	die('Something wrong with post!');
}
?>
