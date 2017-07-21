<?php
session_name("Members");
session_start(); //Start the current session
$sid = $_SESSION['stdid'];
include_once('../admin/config.php');
require_once('../functions/sammysql.inc.php');
$ezzzy = new SamMysql($con);
$mid = $_SESSION['stdid'];
$updateid;
if(isset($_POST['thecore']))
{

	//check if this is an ajax request
	if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
		die("Oops!! Not an Ajax Request! Talk to ezzzy Pls");
	}

    /**Let us collect the other form data*/
            $post=mysqli_real_escape_string($con, $_POST['thecore']);
            $nid=$_POST['thenews'];//this is the news id
         //all is well
              $sql="INSERT INTO newscomments(newsid,memberid,dates,comment) VALUE ('$nid','$mid',NOW(),'$post')";
              $qr=mysqli_query($con,$sql) or die('could not perform insertion'.  mysql_error());
              $updateid = mysqli_insert_id($con);
              if($qr){
                //die('Success!');
                /********************************************************************************************/
                ?>
                      <?php
										//$member_id=$_SESSION['member_id'];
                                        //$postidd = $row['rec_id'];
										$member_id=$_SESSION['stdid'];
										$poster1 = mysqli_query($con, "SELECT * FROM newscomments WHERE newsid='$nid' ORDER by rec_id DESC")or die(mysqli_error($con));
										while($row1 = mysqli_fetch_array($poster1))
										{
												$mid = $row1['memberid'];
                                                //let us get the images of the person
                                /****************************************************************************************************/
                                    //let us get the image of this user
                                        $imggg = $ezzzy->showpic("member_id",$mid,"PROFILE");
                                /****************************************************************************************************/
												$newsid = $row1['rec_id'];
										    //let us get the user info from his membership details
											$rows1 = $ezzzy->getrow("member_id",$mid,"members");//this is the person that made the post
							       ?>
              						<header class="panel-heading">
                                      <a class="pull-left thumb-sm avatar"><img src="<?php echo $imggg; ?>" class="img-circle"></a>
                                       <a href="./?lnk=profile&id=<?php echo $mid; ?>">By : <?php echo $rows1['firstname']." ".$rows1['lastname']; ?></a>
                                       <label class="label bg-success m-l-xs">User</label>
                                       <span class="text-muted m-l-sm pull-right"> <i class="icon-time"></i> <?php echo $row1['dates']; ?> </span>
                                      </header>
                                      <div class="panel-body"> <div><?php echo $row1['comment']; ?></div>
                                        <div class="comment-action m-t-sm"><?php if($member_id == $mid ) { ?> <a onclick="return confirm('sure to delete?');" href="del.php?id=<?php echo $row1['rec_id']; ?>&amp;typ=delnco"  class="btn btn-white btn-xs"><i class="icon-trash text-muted"></i>Remove</a><?php } ?></div>
              						</div>
                                      <?php
                                       }//end of the while loop That brings up the news comment

						}//end of the if statement that checks if the insert query was successfull
              /********************************************************************************************/
              }//end of the if tstement that checks if the comment is set for entry
else
{
	die('Something wrong with post!');
}

