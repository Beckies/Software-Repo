<?php
session_name("Members");
session_start(); //Start the current session
$id = $_SESSION['stdid'];
include_once('../admin/config.php');
require_once('../functions/sammysql.inc.php');
$ezzzy = new SamMysql($con);
$postid = $_GET['id'];

									$query2 = mysqli_query($con, "SELECT * FROM postlike WHERE postid='$postid' AND memberid='$id'") or die (mysqli_error());
									$numberOfRows = mysqli_num_rows($query2);
									if ($numberOfRows == 0)
									{
										mysqli_query($con, "INSERT INTO postlike(postid,memberid) VALUES('$postid','$id') ")or die(mysqli_error());
                                        ?>
                                        <span style="cursor: pointer;" id="thek<?php echo $postid; ?>" onclick="<?php echo 'DoLike('.$postid.')'; ?>" value="<?php echo $postid;?>">(<?php echo $ezzzy->getrecords("postlike"); ?>)<i class="icon-thumbs-down text-danger"></i><!--Unlike--></span>
                                        <?php
									}
										else
											{
											  mysqli_query($con, "DELETE FROM postlike WHERE postid ='$postid' and memberid='$id'")or die(mysqli_error());
											  mysqli_query($con, "DELETE FROM postlike WHERE postid='0' or memberid='0'")or die(mysqli_error());
                                              ?>
                                              <span style="cursor: pointer;" id="thek<?php echo $postid; ?>" onclick="<?php echo 'DoLike('.$postid.')'; ?>" value="<?php echo $postid;?>">(<?php echo $ezzzy->getrecords("postlike"); ?>)<i class="icon-thumbs-up text-success"></i><!--Like--></span>
                                              <?php
											}
								?>
