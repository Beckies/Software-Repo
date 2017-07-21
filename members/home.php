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
$member_id = $_SESSION['stdid'];
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
<script src="../js/jquery-1.10.2.min.js"></script>
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
                                    <form enctype="multipart/form-data" id="MyUploadForm" action="getpost.php" method="post">
                                        <textarea id="FileInput" name="themind" class="form-control input-lg no-border" rows="2" placeholder="What are you doing..."></textarea>                                     
                                    <footer class="panel-footer bg-light lter"> 
                                        <button id="FormSubmitt" class="btn btn-info pull-right" name="shareee">POST</button> 
                                        <img src="../images/ajax-loader.gif" class="icon-spinner icon-spin" id="loading-img" style="display:none;" alt="Please Wait"/>
                                        <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt"></div></div>
                                        <div id="output"></div>
                                        <ul class="nav nav-pills"> 
                                            <div class="frmUpload form-group m-t-lg" id="picc"  style="display:none;">
						<div class="col-sm-9 media m-t-none"> 
                                                    <div class="img-preview bg-light pull-left text-center media-lg thumb-lg padder-v">
							<i class="icon-user inline icon-light icon-3x m-t-lg m-b-lg"></i>
                                                    </div> 
												<div class="media-body"> 
												<input type="file" name="pic" id="userImage" title="Browse to upload" class="user-image btn btn-sm btn-info m-b-sm"><br>
												<button class="btn btn-sm btn-default" onclick="">Delete</button>
												</div> 
												</div>
											 </div>
												
												<li class="go"><a href="#" class="fly btn-sm btn-primary btn-xs" title="Browse to upload"><i class="icon-camera">Add Photo</i></a></li>
                                        </ul> 
                                    </footer>
                                        </form> 
                                </section> 
                                
                                <div class="row">
                                    <!-- From Some Where -->
                                        <div id="theco"><!-- We are starting our Ajax post here -->
                                            <!-- The main -->
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
														<small class=""> <a href="#"><i class="icon-comment-alt"></i>Report</a> </small>
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
                                    ?>
                                    <!-- /The main -->   
                                        </div>  <!-- We are suppose to end our Ajax Post here -->
                                    <!-- /From Some Where -->                                                                     
                                </div>                                                                
                                <div class="text-center m-b"> <i class="icon-spinner icon-spin"></i> </div> 
                            </div> 
                            
                            <?php include_once('../pages/mfooter.php'); ?>