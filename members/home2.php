<?php
session_name("Members");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES")
{  
  include_once('../admin/index.php');
  exit;
}
$mytitle = "WELCOME :: ";
include_once('../pages/mheader.php');
$name = $_SESSION['name'];
				$id = $_SESSION['stdid'];
                if(isset($_GET['act']) && $_GET['act'] == "delpost"){
                  $rec = $_GET['id'];
                  mysqli_query($con,"DELETE FROM posts WHERE rec_id='$rec'") or die("Cannot delete the post");
                  mysqli_query($con,"DELETE FROM postcomments WHERE postid='$rec'") or die("Cannot delete the post");
                  mysqli_query($con,"DELETE FROM postlike WHERE postid='$rec'") or die("Cannot delete the post");
                }
                if(isset($_GET['act']) && $_GET['act'] == "delcom"){
                  $rec = $_GET['id'];
                  mysqli_query($con,"DELETE FROM postcomments WHERE postcommentid='$rec'") or die("Cannot delete the post");
                }
?>

<!-- loading image -->
<script src="../js/ajax-upload.js"></script>
<link rel="stylesheet" href="../css/style.css" />
<script type="text/javascript" >
 $(document).ready(function() {
			$("a.fly").click(function(){
			$(".go").remove();
			$("#picc").show();
		  });
        });
</script>
<!-- Style to preview images -->
<!-- End of styles that calls image -->
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax.js"></script>
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax1.js"></script>
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax11.js"></script>
<!-- Ezzzy Ajax Posting -->
<script type="text/javascript" src="../js/js/jquery.form.min.js"></script>
<script type="text/javascript">
//jc = jquery.noConflict();
$(document).ready(function() {
	var options = {
			target:   '#theco',   // target element(s) to be updated with server response
			beforeSubmit:  beforeSubmit,  // pre-submit callback
			success:       afterSuccess,  // post-submit callback
			uploadProgress: OnProgress, //upload progress callback
			resetForm: true        // reset the form after successful submit
		};

	 $('#MyUploadForm').submit(function() {
			$(this).ajaxSubmit(options);
			// always return false to prevent standard browser submit and page navigation
			return false;
		});


//function after succesful file upload (when server response)
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar
    //$("#output").html("Are you kidding me?");

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#FileInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false;
		}
		//$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//progress bar function
function OnProgress(event, position, total, percentComplete)
{
    //Progress bar
	$('#progressbox').show();
    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes === 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

});
</script>
<script type="text/javascript" language="javascript" src="autoload.js"></script>
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax4.js"></script>
            
            <!-- .vbox --> 
            <section id="content"> 
                <section class="vbox"> 
                    <header class="header bg-white b-b"> 
                        <p>Welcome, <?php echo $_SESSION['name']; ?></p> 
                    </header> 
                    <section class="scrollable wrapper"> 
                        <div class="row"> 
                            <div class="col-lg-8"> 
                                <section class="panel"> 
                                    <form> 
                                        <textarea class="form-control input-lg no-border" rows="2" placeholder="What are you doing..."></textarea> 
                                    </form> 
                                    <footer class="panel-footer bg-light lter"> 
                                        <button class="btn btn-info pull-right">POST</button> 
                                        <ul class="nav nav-pills"> 
                                            <li><a href="#"><i class="icon-location-arrow"></i></a></li> 
                                            <li><a href="#"><i class="icon-camera"></i></a></li> 
                                            <li><a href="#"><i class="icon-facetime-video"></i></a></li> 
                                            <li><a href="#"><i class="icon-microphone"></i></a></li> 
                                        </ul> 
                                    </footer>
                                </section> 
                                
                                <div class="row">
                                    <!-- From Some Where -->
                                        <div id="theco"><!-- We are starting our Ajax post here -->
               <?php
										//$member_id=$_SESSION['member_id'];
										$member_id=$_SESSION['stdid'];
										$poster = mysqli_query($con, "SELECT * FROM posts WHERE member_id = '$member_id' ORDER by dates DESC")or die(mysqli_error());
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
									<section class="panel">
									<div class="panel-body">
									<input type='hidden' value='<?php echo $row['rec_id'];?>' name='cantseeme'/>
									<div id="<?php echo $postid; ?>">
									<small class="text-muted pull-right"><?php echo $row['dates'];?> ago</small>
									<a href="#" class="thumb-sm pull-left m-r"> <img src="<?php echo $imggg; ?>" class="user-image"> </a>
									<div class="clear">
									<a href="./?lnk=profile&id=<?php echo $id; ?>"><strong><?php echo $rows['firstname'];?></strong></a>
									<small class="block text-muted"><?php ?></small>
									</div>
									</div>
                                    <?php
                                    //what if there is an image in this post
                                      if($row['picture'] != ""){
                                    ?>
									<div class="wrapper h3 font-thin">
										<img id="lightbox-container-image-boxx"  class="res" src="<?php echo $row['picture']; ?>">
									</div>
                                    <?php
                                     }//enf of the if statement that displays a post's image if there exist one
                                    ?>
									<p> <?php echo $row['actualpost']; ?></p>
									 <?php
                                             //let us check if the post has been liked
                                             //so that we can display the appropriate like or unlike
                                             $thel = mysqli_query($con,"SELECT * FROM postlike WHERE postid='$postid' AND memberid='$id'") or die("Cannot check if the post has been liked or not");
                                             if(mysqli_fetch_array($thel) == 0){
                                            ?>
                                            <span style="cursor: pointer;" id="thek<?php echo $row['rec_id']; ?>" onclick="<?php echo 'DoLike('.$row['rec_id'].')'; ?>" value="<?php echo $row['rec_id'];?>">(<?php echo $allcountlike; ?>)<i class="icon-thumbs-up text-success"></i>Like</span>
                                            <?php
                                             }//end of the if statement that checks if the post has not been liked
                                             //what if it has been liked, we are going to display the unlike link
                                             else{
                                            ?>
                                            <span style="cursor: pointer;" id="thek<?php echo $row['rec_id']; ?>" onclick="<?php echo 'DoLike('.$row['rec_id'].')'; ?>" value="<?php echo $row['rec_id'];?>">(<?php echo $allcountlike; ?>)<i class="icon-thumbs-down text-danger"></i>Unlike</span>
                                             <?php
                                              }//end of the else statement that checks if the post has not been liked
                                             ?>

							<small class=""> <a href="#"><i class="icon-comment-alt"></i> Voice(<?php echo $allcount;?>)</a> </small>

												<?php
													if ($row['member_id'] == $_SESSION['stdid'])
													{
														echo '
														<small class=""><a onclick="return confirm(sure to delete?);" href="./?lnk=home&id='.$row["rec_id"].'&amp;act=delpost"><i class="icon-remove-circle"></i>Drop</a> </small>';
													}
													else
													{
														echo '
														<small class=""> <a href="#"><i class="icon-comment-alt"></i>Report</a> </small>
														';
													}
												?>
									</div>
									<!-- post-comment -->
									<?php
										//$member_id=$_SESSION['member_id'];
                                        $postidd = $row['rec_id'];
										$member_id=$_SESSION['stdid'];
										$poster1 = mysqli_query($con, "SELECT * FROM postcomments WHERE postid='$postidd' ORDER by dates DESC")or die(mysqli_error($con));
										while($row1 = mysqli_fetch_array($poster1))
										{
												$mid = $row1['memberid'];
												$comid = $row1['postcommentid'];
                                                //let us get the images of the person
                                /****************************************************************************************************/
                                    //let us get the image of this user
                                       $imggg = $ezzzy->showpic("member_id",$id,"PROFILE");
                                /****************************************************************************************************/
										    //let us get the user info from his membership details
											//$ezzzy = new SamMysql($con);
											$rows1 = $ezzzy->getrow("member_id",$mid,"members");//this is the person that made the post
											$allcount = $ezzzy->getrecords("postcomments","postid",$row['rec_id']);
											$allcountlike = $ezzzy->getrecords("postlike","postid",$postid);

							       ?>
									<div class="panel-body">
									<section id="thecorep<?php echo $postidd; ?>">
									<article id="comment-id-3" class="comment-item"> <a class="pull-left thumb-sm avatar"><img src="<?php echo $imggg; ?>" class="img-circle"></a> <span class="arrow left"></span>
									<section class="comment-body panel">
									<header class="panel-heading"> <a href="./?lnk=profile&id=<?php echo $id; ?>">By :</a> <label class="label bg-success m-l-xs"><?php echo $rows1['firstname']." ".$rows1['lastname']; ?></label> <span class="text-muted m-l-sm pull-right"> <i class="icon-time"></i> about 1 hour ago </span> </header>
									<div class="panel-body">
									<div><?php echo $row1['comment']; ?></div>
									<div class="comment-action m-t-sm"><?php if($member_id == $mid ) { ?> <a onclick="return confirm('sure to delete?');" href="./?lnk=home&id=<?php echo $row1['postcommentid']; ?>&amp;act=delcom"  class="btn btn-white btn-xs"><i class="icon-trash text-muted"></i>Remove</a><?php } ?>
									</div>
									</div>
									</section>
									</article>
                                    </section>
									</div>
									<?php
                                }//end of the while loop that pop up the comments for a particular post
                                ?>
									<!-- post-comment -->
									<footer class="panel-footer pos-rlt">
									<span class="arrow top"></span>
									<form id="MyCoForm<?php echo $postidd; ?>" method="post" action="" name="<?php echo $postidd; ?>" class="pull-out">
									<div class="input-group">
                                    <input type="hidden" value="<?php echo $postidd; ?>" id="thepostid" name="thepostid" />
									<input onchange="" type="text" name="thecore" id="textboxcontent<?php echo $postidd; ?>" class="form-control no-border input-sm text-sm" placeholder="Write a comment..." autocomplete="off">
									<span class="input-group-btn">
									 <button value="ECHO" type="submit" id="<?php echo $postidd; ?>" class="btn small color1 comment_submit">post</button>
									</span>
									</div>
									</form>
									</footer>
								</section>
								<?php
									}//end of the while loop that checks for the post in the db									
								?>
             </div>  <!-- We are suppose to end our Ajax Post here -->
                                    <!-- /From Some Where -->
                                    
                                    <! -- The main -->
                                    <div class="col-lg-6 col-sm-6"> 
                                        <section class="panel"> 
                                            <div class="panel-body"> 
                                                <div class="clearfix m-b"> 
                                                    <small class="text-muted pull-right">5m ago</small> 
                                                    <a href="#" class="thumb-sm pull-left m-r"> 
                                                        <img src="../images/avatar.jpg" class="img-circle"> 
                                                    </a> 
                                                    <div class="clear"> 
                                                        <a href="#"><strong>Person Person</strong></a> 
                                                        <small class="block text-muted">Nigeria, Osun</small> 
                                                    </div> 
                                                </div> 
                                                
                                                <p> Some Things Here... </p> 
                                                <small class=""> <a href="#"><i class="icon-comment-alt"></i> Comments (25)</a> </small> 
                                            </div> 
                                            <footer class="panel-footer pos-rlt"> <span class="arrow top"></span>                                                 
                                                <form class="pull-out"> 
                                                    <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> 
                                                </form> 
                                            </footer> 
                                        </section> 
                                    </div>
                                    <! -- /The main -->
                                    <div class="col-lg-6 col-sm-6"> 
                                        <section class="panel"> 
                                            <div class="panel-body"> 
                                                <div class="clearfix m-b"> 
                                                    <small class="text-muted pull-right">1hr ago</small> 
                                                    <a href="#" class="thumb-sm pull-left m-r"> <img src="../images/avatar_default.jpg" class="img-circle"> </a> 
                                                    <div class="clear"> <a href="#"><strong>Mike Mcalidek</strong></a> 
                                                        <small class="block text-muted">Nigeria, Osun</small> 
                                                    </div> 
                                                </div> 
                                                
                                                <div class="pull-in bg-light clearfix m-b-n"> 
                                                    <p class="m-t-sm m-b text-center animated bounceInDown"> 
                                                        <i class="icon-map-marker text-danger icon-4x" data-toggle="tooltip" title="checked in at Newyork"></i> 
                                                    </p> 
                                                </div> 
                                            </div> 
                                            
                                            <footer class="panel-footer pos-rlt"> 
                                                <span class="arrow top"></span> 
                                                <form class="pull-out"> 
                                                    <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> 
                                                </form> 
                                            </footer> 
                                        </section> 
                                    </div> 
                                </div> 
                                
                                <section class="panel no-borders hbox"> 
                                    <aside class="bg-info lter r-l text-center v-middle"> 
                                        <div class="wrapper"> <i class="icon-dribbble icon-4x"></i> 
                                            <p class="text-muted"><em>dribbble invitation</em></p> 
                                        </div> </aside> 
                                    <aside> 
                                        <div class="pos-rlt"> 
                                            <span class="arrow left hidden-xs"></span> 
                                            <div class="panel-body"> 
                                                <div class="clearfix m-b"> 
                                                    <small class="text-muted pull-right">2 days ago</small> 
                                                    <a href="#" class="thumb-sm pull-left m-r"> <img src="../images/avatar.jpg" class="img-circle"> </a> 
                                                    <div class="clear"> <a href="#"><strong>Person Person</strong></a> 
                                                        <small class="block text-muted">Nigeria, Osun</small> 
                                                    </div> 
                                                </div> 
                                                <p> Thank you for invite... </p> 
                                                <small class=""> <a href="#"><i class="icon-comment-alt"></i> Comments (10)</a> </small> 
                                            </div> 
                                            <footer class="panel-footer"> 
                                                <form class="pull-out b-t"> 
                                                    <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> 
                                                </form> 
                                            </footer> 
                                        </div> 
                                    </aside> 
                                </section> 
                                
                                <section class="panel no-borders hbox">
                                    <aside> 
                                        <div class="pos-rlt"> 
                                            <span class="arrow right hidden-xs"></span> 
                                            <div class="panel-body"> <div class="clearfix m-b"> 
                                                    <small class="text-muted pull-right">2 days ago</small> 
                                                    <a href="#" class="thumb-sm pull-left m-r"> 
                                                        <img src="../images/avatar.jpg" class="img-circle"> 
                                                    </a> 
                                                    <div class="clear"> 
                                                        <a href="#"><strong>Person Person</strong></a> 
                                                        <small class="block text-muted">Nigeria, Osun</small> 
                                                    </div> 
                                                </div> 
                                                <p> Some Things Hete... </p> 
                                                <small class=""> <a href="#"><i class="icon-share"></i> Share (10)</a> </small> 
                                            </div> 
                                            <footer class="panel-footer"> 
                                                <form class="pull-out b-t"> 
                                                    <input type="text" class="form-control no-border input-lg text-sm" placeholder="Write a comment..."> 
                                                </form> 
                                            </footer> 
                                        </div> 
                                    </aside> 
                                    
                                    <aside class="bg-primary clearfix lter r-r text-right v-middle"> 
                                        <div class="wrapper h3 font-thin"> 7 things you need to know about me</div> 
                                    </aside> 
                                </section>                                
                                <div class="text-center m-b"> <i class="icon-spinner icon-spin"></i> </div> 
                            </div> 
                            
                            <?php include_once('../pages/mfooter.php'); ?>