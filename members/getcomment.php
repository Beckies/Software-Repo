<?php
session_name("Members");
session_start(); //Start the current session
$sid = $_SESSION['stdid'];
include_once('../admin/config.php');
require_once('../functions/sammysql.inc.php');
$ezzzy = new SamMysql($con);
$midd = $_SESSION['stdid'];
$updateid;
//$posti = explode("-",$_POST['thepostid']);
$postid = $_POST['com_msgid'];
if(isset($_POST['thecore']))
{

	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
	  echo "postid = ". $postid."<br />";
  echo "The Post=". $_POST['thecore']."<br />";
	die("Oops!! Not an Ajax Request! Talk to ezzzy Pls");
	}

    /**Let us collect the other form data*/
            $comment=$_POST['thecore'];
         //all is well
              $sql="INSERT INTO postcomments(postid,memberid,dates,comment) VALUE ('$postid','$midd',NOW(),'$comment')";
              $qr=mysqli_query($con,$sql) or die('could not perform insertion'.  mysql_error($con));
              $updateid = mysqli_insert_id($con);
              if($qr){
                //die('Success!');
                /********************************************************************************************/
                ?>

                         <?php
										//$member_id=$_SESSION['member_id'];
										$member_id=$_SESSION['stdid'];
										$poster = mysqli_query($con, "SELECT * FROM postcomments WHERE postid = '$postid' ORDER by dates DESC")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($poster))
										{
												$id = $row['memberid'];
												//let us get the images of the person
                                /****************************************************************************************************/
                                    //let us get the image of this user
                                        $imggg = $ezzzy->showpic("member_id",$id,"PROFILE");
                                /****************************************************************************************************/
												$comid = $row['postcommentid'];
										    //let us get the user info from his membership details
											$ezzzy = new SamMysql($con);
											$rows = $ezzzy->getrow("member_id",$id,"members");//this is the person that made the post
											$allcount = $ezzzy->getrecords("postcomments","postid",$postid);
											$allcountlike = $ezzzy->getrecords("postlike","postid",$postid);

							?>
									<!-- post-comment -->
                                <section id="thecorep<?php echo $postid; ?>">
									<div class="panel-body">
									<article id="comment-id-3" class="comment-item"> <a class="pull-left thumb-sm avatar"><img src="<?php echo $imggg; ?>" class="img-circle"></a> <span class="arrow left"></span>
									<section class="comment-body panel">
									<header class="panel-heading"> <a href="./?lnk=profile&id=<?php echo $id; ?>">By :</a> <label class="label bg-success m-l-xs"><?php echo $rows['firstname']." ".$rows['lastname']; ?></label> <span class="text-muted m-l-sm pull-right"> <i class="icon-time"></i> <?php echo $row['dates']; ?> </span> </header>
									<div class="panel-body"> <div><?php echo $row['comment']; ?></div>
                                    <div class="comment-action m-t-sm"><?php if($member_id == $id ) { ?> <a onclick="return confirm('sure to delete?');" href="home.php?id=<?php echo $row['postcommentid']; ?>&amp;act=delcom"  class="btn btn-white btn-xs"><i class="icon-trash text-muted"></i>Remove</a><?php } ?></div>
									</div>
									</section>
									</article>
									</div>
									<!-- post-comment -->									
								</section>
								<?php

							}
						}
              /********************************************************************************************/
              }
  //}//end of the if statement that checks the uploaded file
else
{
  echo "postid = ". $postid."<br />";
  echo "The Post=". $_POST['thecore']."<br />";
	die('Something wrong with Comment!');
}

