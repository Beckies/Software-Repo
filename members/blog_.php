<?php
session_name("Members");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES")
{  
  include_once('../admin/index.php');
  exit;
}
$mytitle = "BLOG :: ";
include_once('../pages/mheader.php');
$name = $_SESSION['name'];
$member_id = $_SESSION['stdid'];
				$id = $_SESSION['stdid'];
                if(isset($_GET['act']) && $_GET['act'] == "delpost"){
                  $rec = $_GET['id'];
//                  mysqli_query($con,"DELETE FROM posts WHERE rec_id='$rec'") or die("Cannot delete the post");
//                  mysqli_query($con,"DELETE FROM postcomments WHERE postid='$rec'") or die("Cannot delete the post");
//                  mysqli_query($con,"DELETE FROM postlike WHERE postid='$rec'") or die("Cannot delete the post");
                }
                if(isset($_GET['act']) && $_GET['act'] == "delcom"){
                  $rec = $_GET['id'];
                  //mysqli_query($con,"DELETE FROM postcomments WHERE postcommentid='$rec'") or die("Cannot delete the post");
                }
?>
<!-- End of styles that calls image -->
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax.js"></script>
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax1.js"></script>
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax11.js"></script>            
            <!-- .vbox --> 
            <section id="content"> 
                <section class="vbox"> 
                    <header class="header bg-white b-b"> 
                        <p>Welcome, <?php echo $_SESSION['name']; ?></p> 
                    </header> 
                    <section class="scrollable wrapper"> 
                        <div class="row"> 
                            <div class="col-lg-8">                                
                                <div class="row">
                                    <!-- From Some Where -->
                                        <div id="theco"><!-- We are starting our Ajax post here -->
                                            <!-- The main -->
                                        <?php
                                        //$poster = mysqli_query($con, "SELECT * FROM posts WHERE member_id = '$member_id' ORDER by dates DESC")or die(mysqli_error($con)); // we will use this wen we start dealing with friends
										if(isset($_GET['typ']) && $_GET['typ'] == "cat"){
										   $poster = $ezzzy->getallrow("postid",$_GET['id'],"news");
										  }
										  else{
											  $poster = $ezzzy->getallresult("news");              
										  }
                                        //$poster = mysqli_query($con, "SELECT * FROM news WHERE ntype='BLOG' ORDER by dates DESC")or die(mysqli_error($con));
										while($row = mysqli_fetch_array($poster))
										{
												$id = $row['who'];
                                                //let us get the images of the person
                                /****************************************************************************************************/
                                    $imggg = $ezzzy->showpic("member_id",$id,"PROFILE");
                                /****************************************************************************************************/
												$postid = $row['rec_id'];
										    //let us get the user info from his membership details
											$ezzzy = new SamMysql($con);
											$rows = $ezzzy->getrow("rec_id",$id,"login_admin");
											$allcount = $ezzzy->getrecords("postcomments","postid",$postid);
											$allcountlike = $ezzzy->getrecords("postlike","postid",$postid);
							?>
                                    <div class="col-lg-6 col-sm-6"> 
                                        <section class="panel"> 
                                            <div class="panel-body"> 
                                                <div class="clearfix m-b">
													<?php                                                                                
														$mtime=date("c", strtotime($row['adt']));
													?>												
                                                    <small class="text-muted pull-right"><a class="timeago" title="<?php echo $mtime; ?>"></a></small> 
                                                    <a href="#" class="thumb-sm pull-left m-r"> 
                                                        <img src="<?php echo $imggg; ?>" class="img-circle"> 
                                                    </a> 
                                                    <div class="clear"> 
                                                        <a href="./?lnk=article_det&id=<?php echo $id; ?>"><strong><?php echo $row['title'];?></strong></a>
                                                        <small class="block text-muted"><?php echo $rows['name'];?></small> 
                                                    </div>
                                                    <?php                                                        
                                                    if($row['picture'] != ""){
                                                    ?>
                                                    <div class="img"><img class="img" width="300" height="243" src="<?php if(!file_exists("../admin/".$row['picture'])){echo "../images/logo1.jpg";} else{ echo "../admin/".$row['picture'];} ?>" /></div>
                                                    <?php
                                                        }
                                                    ?>
                                                </div> 
                                                
                                                <input type='hidden' value='<?php echo $row['rec_id'];?>' name='cantseeme'/>
                                                <p> <?php echo $row['descp']; ?> </p>
                                                
                                                <?php
                                             //let us check if the post has been liked
                                             //so that we can display the appropriate like or unlike
                                             $thel = mysqli_query($con,"SELECT * FROM postlike WHERE postid='$postid' AND memberid='$id'") or die("Cannot check if the post has been liked or not");
                                             if(mysqli_fetch_array($thel) == 0){
                                            ?>
                                            <span style="cursor: pointer;" id="thek<?php echo $row['rec_id']; ?>" onclick="<?php echo 'DoLike('.$row['rec_id'].')'; ?>" value="<?php echo $row['rec_id'];?>">(<?php echo $allcountlike; ?>)<i class="icon-heart text-success"></i>Kiss</span>
                                            <?php
                                             }//end of the if statement that checks if the post has not been liked
                                             //what if it has been liked, we are going to display the unlike link
                                             else{
                                            ?>
                                            <span style="cursor: pointer;" id="thek<?php echo $row['rec_id']; ?>" onclick="<?php echo 'DoLike('.$row['rec_id'].')'; ?>" value="<?php echo $row['rec_id'];?>">(<?php echo $allcountlike; ?>)<i class="icon-heart-empty text-danger"></i>Unlike</span>
                                             <?php
                                              }//end of the else statement that checks if the post has not been liked
                                             ?>
                                            <small class=""> <a href="./?lnk=article_det&AMP;id=<?php echo $row['rec_id']; ?>"><i class="icon-comment-alt"></i> Comments (<?php echo $allcount;?>)</a> </small> 
                                                <?php
//													if ($row['member_id'] == $_SESSION['stdid'])
//													{
//														echo '
//														<small class=""><a onclick="return confirm(sure to delete?);" href="./?lnk=home&id='.$row["rec_id"].'&amp;act=delpost"><i class="icon-remove-circle"></i>Drop</a> </small>';
//													}
//													else
//													{
//														echo '
//														<small class=""> <a href="#"><i class="icon-comment-alt"></i>Report</a> </small>
//														';
//													}
												?>
                                            </div>                                            
                                        </section> 
                                    </div>
                                    <?php
                                     }
                                    ?>
                                    <!-- /The main -->   
                                        </div>  <!-- We are suppose to end our Ajax Post here -->
                                    <!-- /From Some Where -->                                                                     
                                </div>                                                                
                                <div class="text-center m-b"> <i class="icon-spinner icon-spin"></i> </div> 
                            </div> 
                            
                            <?php include_once('../pages/mfooter.php'); ?>