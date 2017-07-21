<?php
session_name("Members");
session_start();
if(@$_SESSION['log'] == null && @$_SESSION['log']!="YES")
{  
  include_once('../admin/index.php');
  exit;
}
$mytitle = "ARTICLE :: ";
include_once('../pages/mheader.php');
$nid=$_GET['id'];
$result = mysqli_query($con,"SELECT * FROM news WHERE rec_id='$nid'") or die("Cannot get the news details");
$rw = mysqli_fetch_array($result);
?>
<script type="text/javascript" language="javascript" src="../styles/ezzzyajax.js"></script>

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
			return false
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
                                    <!-- This is my main content -->
                                <article id="comment-id-4" class="comment-item">
							<a class="pull-left thumb-sm avatar"><img src="<?php echo $imgg; ?>" class="img-circle"></a> <span class="arrow left"></span>
							<section class="comment-body panel">
							<div class="panel-body">
							<aside class="bg-homesuccess clearfix lter r-r text-right v-middle"> 
								<div class="wrapper h3 font-thin"> 
									<?php
										if($rw['picture'] != ""){
										?>
										<img id="lightbox-container-image-boxx" width="320" height="200" class="res" src="<?php echo "../admin/".$rw['picture']; ?>">										
										<?php
										}
									?>
								</div> 
							</aside>
							<blockquote>
							<p style="text-transform: uppercase;"><?php echo $rw['title']; ?></p>
                                                        <small>From: <cite title="Source Title"><?php if($rw['memberid'] != 0){ echo $ezzzy->getval("member_id",$rw['memberid'],"members","firstname"); } else if($rw['who'] != 0){ echo $ezzzy->getval("rec_id",$rw['who'],"login_admin","name"); } ?></cite></small>
							</blockquote>
							<div>							
                                                        <?php echo $rw['descp']; ?>
                                                       </div>
							</div>
                                                            
                                                            <div class="post-info clearfix">
                                                                <ul class="pinfo">                                                                  
                                                                  <?php if($rw['apath'] == ""){ ?>
                                                                  <li class="sharethis btn dropdown hidden-xs"><i class="fa fa-share-square-o"></i><a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" href="#a">Share This Post</a>
                                                                    <ul class="dropdown-menu">
                                                                      <li> <a href="#" target="_blank" rel="nofollow" class="sharefacebook"> <i class="fa fa-facebook-square"></i> Facebook</a> </li>
                                                                      <li><a href="#" target="_blank" rel="nofollow" class="sharegoogleplus"><i class="fa fa-google-plus-square"></i> Google+ </a></li>
                                                                      <li><a href="#" target="_blank" rel="nofollow" class="sharetwitter"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                                                                      <li><a href="#" target="_blank" rel="nofollow" class="sharepinterest"><i class="fa fa-pinterest-square"></i> Pinterest </a></li>
                                                                    </ul>
                                                                  </li>
                                                                  <?php
                                                                    }//end of the if statement that says its a blog
                                                                    else if($rw['apath'] != ""){ ?>
                                                                  <li class="sharethis btn dropdown hidden-xs"><i class="fa fa-download"></i><a class="" data-toggle="" data-hover="" href="<?php echo "../admin/".$rw['apath']; ?>">Download Now</a>            
                                                                  </li>
                                                                  <?php
                                                                    }//end of the else statement that says its an app
                                                                  ?>
                                                                </ul>
                                                            </div>
                                                            
							</section>
						</article>
						<!-- comment form -->
					<article class="comment-item media" id="comment-form">
					<a class="pull-left thumb-sm avatar"><img src="<?php echo $imgg; ?>" class="img-circle"></a>
					<section class="media-body">
					<form id="MyUploadForm" method="post" action="getnco.php" class="m-b-none"> <div class="input-group">
                                        <input type="hidden" name="thenews" value="<?php echo $rw['rec_id']; ?>" />
					<input autocomplete="off " type="text" id="FileInput" name="thecore" class="form-control" placeholder="Input your comment here">
					<span class="input-group-btn">
                                        <button value="" type="submit" id="FormSubmitt" class="btn small color1">Comment</button>
					</span>
					</div>
					</form>
                    <img class="icon-spinner icon-spin" src="../images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
                    <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt"></div></div>
                    <div id="output"></div>
					</section>
					</article>
					<!-- /comment form -->

					<!-- post-comment -->
                        <div class="panel-body">
    						<article id="comment-id-3" class="comment-item">  <span class="arrow left"></span>
                            <section class="comment-body panel">
                            <span id="theco">
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
                                       <a target="_blank" href="./?lnk=profile&id=<?php echo $mid; ?>">By : <?php echo $rows1['firstname']." ".$rows1['lastname']; ?></a>
                                       <label class="label bg-success m-l-xs">User</label>
                                       <span class="text-muted m-l-sm pull-right"> <i class="icon-time"></i> <?php echo $row1['dates']; ?> </span>
                                      </header>
                                      <div class="panel-body"> <div><?php echo $row1['comment']; ?></div>
                                        <div class="comment-action m-t-sm"><?php if($member_id == $mid ) { ?> <a onclick="return confirm('sure to delete?');" href="del.php?id=<?php echo $row1['rec_id']; ?>&amp;typ=delnco"  class="btn btn-white btn-xs"><i class="icon-trash text-muted"></i>Remove</a><?php } ?></div>
              						</div>
                                      <?php
                                       }//end of the while loop That brings up the news comment
                                      ?>
                                      </span>
              						</section>
              						</article>
          						</div>
					<!-- post-comment -->
                                    <!-- /This is my main content -->
                                </section>
                                
                            </div> 
                            
                            <?php include_once('../pages/mfooter.php'); ?>